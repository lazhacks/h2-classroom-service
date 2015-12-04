<?php

return [
    'dependencies' => [
        'factories' => [
            Classroom\Action\ClassroomAction::class => Classroom\Factory\ClassroomActionFactory::class,
            Classroom\Service\ClassroomService::class => Classroom\Factory\ClassroomServiceFactory::class,

            Zend\Expressive\Application::class => Zend\Expressive\Container\ApplicationFactory::class,
        ],
        'abstract_factories' => [
            Zend\Db\Adapter\AdapterAbstractServiceFactory::class,
            Zend\Cache\Service\StorageCacheAbstractServiceFactory::class
        ],

        'initializers' => [
            Common\Cache\RedisCacheInitializer::class
        ],
    ]
];
