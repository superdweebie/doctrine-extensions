<?php

namespace Sds\DoctrineExtensions\Test\SoftDelete\TestAsset\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Sds\Common\SoftDelete\SoftDeleteableInterface;
use Sds\DoctrineExtensions\AccessControl\Mapping\Annotation\DoNotAccessControlUpdate as SDS_DoNotAccessControlUpdate;
use Sds\DoctrineExtensions\SoftDelete\Behaviour\SoftDeleteableTrait;
use Sds\DoctrineExtensions\SoftDelete\Mapping\Annotation\SoftDeleteField as SDS_SoftDeleteField;

/** @ODM\Document */
class Simple implements SoftDeleteableInterface {

    use SoftDeleteableTrait;

    /**
     * @ODM\Id(strategy="UUID")
     */
    protected $id;

    /**
     * @ODM\Field(type="string")
     */
    protected $name;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}