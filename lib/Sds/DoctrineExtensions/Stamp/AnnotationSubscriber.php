<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\DoctrineExtensions\Stamp;

use Sds\DoctrineExtensions\AbstractLazySubscriber;
use Sds\DoctrineExtensions\Annotation\Annotations as Sds;
use Sds\DoctrineExtensions\Annotation\AnnotationEventArgs;

/**
 * Adds create and update stamps during persist
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class AnnotationSubscriber extends AbstractLazySubscriber {

    /**
     *
     * @return array
     */
    public static function getStaticSubscribedEvents() {
        return [
            Sds\Stamp\CreatedBy::event,
            Sds\Stamp\CreatedOn::event,
            Sds\Stamp\UpdatedOn::event,
            Sds\Stamp\UpdatedBy::event,
        ];
    }

    public function annotationStampCreatedBy(AnnotationEventArgs $eventArgs){
        $metadata = $eventArgs->getMetadata();
        if (!isset($metadata->stamp)){
            $metadata->stamp = [];
        }
        $metadata->stamp['createdBy'] = $eventArgs->getReflection()->getName();
    }

    public function annotationStampCreatedOn(AnnotationEventArgs $eventArgs){
        $metadata = $eventArgs->getMetadata();
        if (!isset($metadata->stamp)){
            $metadata->stamp = [];
        }
        $metadata->stamp['createdOn'] = $eventArgs->getReflection()->getName();
    }

    public function annotationStampUpdatedBy(AnnotationEventArgs $eventArgs){
        $metadata = $eventArgs->getMetadata();
        if (!isset($metadata->stamp)){
            $metadata->stamp = [];
        }
        $metadata->stamp['updatedBy'] = $eventArgs->getReflection()->getName();
    }

    public function annotationStampUpdatedOn(AnnotationEventArgs $eventArgs){
        $metadata = $eventArgs->getMetadata();
        if (!isset($metadata->stamp)){
            $metadata->stamp = [];
        }
        $metadata->stamp['updatedOn'] = $eventArgs->getReflection()->getName();
    }
}