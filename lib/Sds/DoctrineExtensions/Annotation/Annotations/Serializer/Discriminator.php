<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\DoctrineExtensions\Annotation\Annotations\Serializer;

use Doctrine\Common\Annotations\Annotation;

/**
 * May be used in two contexts:
 *
 *     Dojo class annotation
 *         If true, will add the discriminator to the generated Dojo Model
 *
 *     Serializer class annotation
 *         If true, the serializer will add the discriminator field to serialization
 *
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 *
 * @Annotation
 */
final class Discriminator extends Annotation
{

    const event = 'annotationSerializerDiscriminator';
    
    public $value = true;
}