<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\DoctrineExtensions\Annotation\Annotations;

use Doctrine\Common\Annotations\Annotation;

/**
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 *
 * @Annotation
 */
final class DojoValidator extends Annotation {

    /**
     * The dojo module name of the validator to use
     *
     * @var string
     */
    public $module;

    /**
     * An array of options to be passed to the class constructor
     *
     * @var array
     */
    public $options;
}