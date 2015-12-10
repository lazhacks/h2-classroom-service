<?php

return [
    'dependencies' => [
        'factories' => [
<<<<<<< HEAD
            Teacher\Action\TeacherAction::class => Teacher\Factory\TeacherActionFactory::class,
            Teacher\Service\TeacherService::class => Teacher\Factory\TeacherServiceFactory::class,
=======
            Classroom\Action\ClassroomAction::class => Classroom\Factory\ClassroomActionFactory::class,
            Classroom\Service\ClassroomService::class => Classroom\Factory\ClassroomServiceFactory::class,
>>>>>>> c411a776b89db22147de00d46f08b3284aee86b6

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
