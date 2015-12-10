<?php

namespace Classroom\Factory;

use Classroom\Action\ClassroomAction;
use Classroom\Service\ClassroomService;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class ClassroomActionFactory
{
    /**
     * @param ContainerInterface $container
     * @return ClassroomAction
     */
    public function __invoke(ContainerInterface $container)
    {
        $router           = $container->get(RouterInterface::class);
        $classroomService = $container->get(ClassroomService::class);

        return new ClassroomAction($router, $classroomService);
    }
}