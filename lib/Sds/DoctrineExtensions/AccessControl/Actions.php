<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\DoctrineExtensions\AccessControl;

/**
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 *
 */
class Actions
{

    /**
     * Create a new resource
     */
    const create = 'create';

    /**
     * Access a resouce and read it's content
     */
    const read = 'read';

    /**
     * Change a resouce's content
     */
    const update = 'update';

    /**
     * Make a resource disappear, never to come back again!
     */
    const delete = 'delete';

}
