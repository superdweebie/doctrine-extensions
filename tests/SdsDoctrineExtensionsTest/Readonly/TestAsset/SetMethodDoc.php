<?php

namespace SdsDoctrineExtensionsTest\Readonly\TestAsset;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use SdsDoctrineExtensions\Readonly\Mapping\Annotation\Readonly as SDS_Readonly;

/** @ODM\Document */
class SetMethodDoc {

    /**
     * @ODM\Id(strategy="UUID")
     */
    protected $id;
    
    /**
     * @ODM\Field(type="string")
     * @SDS_Readonly(setMethod="good")
     */
    protected $goodField;

    /**
     * @ODM\Field(type="string")
     * @SDS_Readonly(setMethod="broken")
     */
    protected $badField;

    public function getId() {
        return $this->id;
    }
    
    public function getGoodField() {
        return $this->goodField;
    }

    public function good($goodField) {
        $this->goodField = $goodField;
    }

    public function getBadField() {
        return $this->badField;
    }

    public function bad($badField) {
        $this->badField = $badField;
    }
}
