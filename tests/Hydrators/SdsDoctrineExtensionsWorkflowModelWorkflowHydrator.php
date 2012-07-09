<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class Sds\DoctrineExtensionsWorkflowModelWorkflowHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data, array $hints = array())
    {
        $hydratedData = array();

        /** @Field(type="string") */
        if (isset($data['startState'])) {
            $value = $data['startState'];
            $return = (string) $value;
            $this->class->reflFields['startState']->setValue($document, $return);
            $hydratedData['startState'] = $return;
        }

        /** @Field(type="hash") */
        if (isset($data['possibleStates'])) {
            $value = $data['possibleStates'];
            $return = $value;
            $this->class->reflFields['possibleStates']->setValue($document, $return);
            $hydratedData['possibleStates'] = $return;
        }

        /** @Many */
        $mongoData = isset($data['transitions']) ? $data['transitions'] : null;
        $return = new \Doctrine\ODM\MongoDB\PersistentCollection(new \Doctrine\Common\Collections\ArrayCollection(), $this->dm, $this->unitOfWork, '$');
        $return->setHints($hints);
        $return->setOwner($document, $this->class->fieldMappings['transitions']);
        $return->setInitialized(false);
        if ($mongoData) {
            $return->setMongoData($mongoData);
        }
        $this->class->reflFields['transitions']->setValue($document, $return);
        $hydratedData['transitions'] = $return;

        /** @Field(type="hash") */
        if (isset($data['vars'])) {
            $value = $data['vars'];
            $return = $value;
            $this->class->reflFields['vars']->setValue($document, $return);
            $hydratedData['vars'] = $return;
        }
        return $hydratedData;
    }
}