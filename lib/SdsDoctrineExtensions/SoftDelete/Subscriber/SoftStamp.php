<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace SdsDoctrineExtensions\SoftDelete\Subscriber;

use Doctrine\ODM\MongoDB\Event\LifecycleEventArgs;
use SdsCommon\SoftDelete\SoftDeletedByInterface;
use SdsCommon\SoftDelete\SoftDeletedOnInterface;
use SdsCommon\SoftDelete\RestoredByInterface;
use SdsCommon\SoftDelete\RestoredOnInterface;
use SdsDoctrineExtensions\SoftDelete\Event\Events as SoftDeleteEvents;
use SdsDoctrineExtensions\Stamp\Subscriber\AbstractStamp;

/**
 * Adds create and update stamps during persist
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class SoftStamp extends AbstractStamp {

    /**
     *
     * @return array
     */
    public function getSubscribedEvents() {
        return array(
            SoftDeleteEvents::postSoftDelete,
            SoftDeleteEvents::postRestore
        );
    }

    /**
     *
     * @param \Doctrine\ODM\MongoDB\Event\LifecycleEventArgs $eventArgs
     */
    public function postSoftDelete(LifecycleEventArgs $eventArgs) {
        $recomputeChangeSet = false;
        $document = $eventArgs->getDocument();
        if($document instanceof SoftDeletedByInterface){
            $document->setSoftDeletedBy($this->activeUser->getUsername());
            $recomputeChangeSet = true;
        }
        if($document instanceof SoftDeletedOnInterface){
            $document->setSoftDeletedOn(time());
            $recomputeChangeSet = true;
        }
        if ($recomputeChangeSet) {
            $this->recomputeChangeset($eventArgs);
        }
    }

    /**
     *
     * @param \Doctrine\ODM\MongoDB\Event\LifecycleEventArgs $eventArgs
     */
    public function postRestore(LifecycleEventArgs $eventArgs) {
        $recomputeChangeSet = false;
        $document = $eventArgs->getDocument();
        if($document instanceof RestoredByInterface){
            $document->setRestoredBy($this->activeUser->getUsername());
            $recomputeChangeSet = true;
        }
        if($document instanceof RestoredOnInterface){
            $document->setRestoredOn(time());
            $recomputeChangeSet = true;
        }
        if ($recomputeChangeSet) {
            $this->recomputeChangeset($eventArgs);
        }
    }
}