<?php

return [
    'dependencies' => [
        'invokables' => [
            Zend\Expressive\Router\RouterInterface::class => Zend\Expressive\Router\ZendRouter::class,
        ],
    ],

    'routes' => [
        [
            'name' => 'api.classroom',
            'path' => '/api/teacher/classroom[/:id]',
            'middleware' => Classroom\Action\ClassroomAction::class,
            'allowed_methods' => ['GET'],
        ],
    ],
];
