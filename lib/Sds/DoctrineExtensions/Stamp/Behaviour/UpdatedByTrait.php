<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\DoctrineExtensions\Stamp\Behaviour;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * Implements \Sds\Common\Stamp\UpdatedByInterface
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
trait UpdatedByTrait {

    /**
     * @ODM\Field(type="string")
     */
    protected $updatedBy;

    /**
     *
     * @param string $username
     */
    public function setUpdatedBy($username){
        $this->updatedBy = (string) $username;
    }

    /**
     *
     * @return string
     */
    public function getUpdatedBy(){
        return $this->updatedBy;
    }
}
