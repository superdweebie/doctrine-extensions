<?php
/**
 * @link       http://superdweebie.com
 * @package    Sds
 * @license    MIT
 */
namespace Sds\DoctrineExtensions\Generator;

use Sds\DoctrineExtensions\AbstractExtension;

/**
 * Defines the resouces this extension requires
 *
 * @since   1.0
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class Extension extends AbstractExtension {

    protected $resourceMap;

    protected $serviceManagerConfig = [
        'factories' => [
            'resourceMap' => 'Sds\DoctrineExtensions\Generator\ResourceMapFactory',
        ]
    ];

    public function getResourceMap() {
        return $this->resourceMap;
    }

    public function setResourceMap($resourceMap) {
        $this->resourceMap = $resourceMap;
    }
}