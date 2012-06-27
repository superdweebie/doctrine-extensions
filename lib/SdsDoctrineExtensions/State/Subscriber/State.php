<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace SdsDoctrineExtensions\State\Subscriber;

use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\EventSubscriber;
use Doctrine\ODM\MongoDB\Event\LoadClassMetadataEventArgs;
use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use Doctrine\ODM\MongoDB\Event\OnFlushEventArgs;
use Doctrine\ODM\MongoDB\Events as ODMEvents;
use SdsCommon\State\StateAwareInterface;
use SdsDoctrineExtensions\AnnotationReaderAwareTrait;
use SdsDoctrineExtensions\AnnotationReaderAwareInterface;
use SdsDoctrineExtensions\State\Event\Events as StateEvents;
use SdsDoctrineExtensions\State\Event\EventArgs as StateChangeEventArgs;
use SdsDoctrineExtensions\State\Mapping\MetadataInjector\State as MetadataInjector;

/**
 * Emits soft delete events
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class State implements EventSubscriber, AnnotationReaderAwareInterface
{
    use AnnotationReaderAwareTrait;

    /**
     *
     * @param \Doctrine\Common\Annotations\Reader $annotationReader
     */
    public function __construct(Reader $annotationReader){
        $this->setAnnotationReader($annotationReader);
    }

    /**
     *
     * @return array
     */
    public function getSubscribedEvents(){
        return array(
            ODMEvents::loadClassMetadata,
            ODMEvents::onFlush
        );
    }

    /**
     *
     * @param LoadClassMetadataEventArgs $eventArgs
     */
    public function loadClassMetadata(LoadClassMetadataEventArgs $eventArgs)
    {
        $metadata = $eventArgs->getClassMetadata();
        $metadataInjector = new MetadataInjector($this->annotationReader);
        $metadataInjector->loadMetadataForClass($metadata);
    }

    /**
     *
     * @param \Doctrine\ODM\MongoDB\Event\OnFlushEventArgs $eventArgs
     */
    public function onFlush(OnFlushEventArgs  $eventArgs)
    {
        $documentManager = $eventArgs->getDocumentManager();
        $unitOfWork = $documentManager->getUnitOfWork();

        foreach ($unitOfWork->getScheduledDocumentUpdates() AS $document) {

            if (!$document instanceof StateAwareInterface) {
                continue;
            }

            $metadata = $documentManager->getClassMetadata(get_class($document));
            if (!isset($metadata->stateField)) {
                throw new \Exception(sprintf(
                    'Document class %s implements the StateAwareInterface, but does not have a field annotatated as @stateField.',
                    get_class($document)
                ));
            }

            $eventManager = $documentManager->getEventManager();
            $changeSet = $unitOfWork->getDocumentChangeSet($document);
            $field = $metadata->stateField;

            if (!isset($changeSet[$field])) {
                continue;
            }

            $fromState = $changeSet[$field][0];
            $toState = $changeSet[$field][1];

            // Raise preStateChange
            if ($eventManager->hasListeners(StateEvents::preStateChange)) {
                $eventManager->dispatchEvent(
                    StateEvents::preStateChange,
                    new StateChangeEventArgs($fromState, $toState, $document, $documentManager)
                );
            }

            if ($document->getState() == $fromState){
                //State change has been rolled back
                $unitOfWork->recomputeSingleDocumentChangeSet($metadata, $document);
                continue;
            }

            // Raise onStateChange
            if ($eventManager->hasListeners(StateEvents::onStateChange)) {
                $eventManager->dispatchEvent(
                    StateEvents::onStateChange,
                    new StateChangeEventArgs($fromState, $toState, $document, $documentManager)
                );
            }

            // Force change set update
            $unitOfWork->recomputeSingleDocumentChangeSet($metadata, $document);

            // Raise postStateChange - this is when workflow vars should be updated
            if ($eventManager->hasListeners(StateEvents::postStateChange)) {
                $eventManager->dispatchEvent(
                    StateEvents::postStateChange,
                    new LifecycleEventArgs($document, $documentManager)
                );
            }
        }
    }
}