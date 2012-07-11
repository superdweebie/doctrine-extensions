<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\DoctrineExtensions\Workflow\Event;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
final class Events
{

    /**
     * Called if state change is attempted which has not transition defined
     */
    const transitionDoesNotExist = 'transitionDoesNotExist';

    /**
     * Convienicene event. Called during onStateChange as a trigger to update
     * workflow vars
     */
    const updateWorkflowVars = 'updateWorkflowVars';
}