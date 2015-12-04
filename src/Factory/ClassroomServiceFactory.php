<?php

namespace Classroom\Factory;

use Common\Db\Mapper\Mapper;
use Classroom\Entity\ClassroomEntity;
use Classroom\Service\ClassroomService;
use Interop\Container\ContainerInterface;

class ClassroomServiceFactory
{
    /**
     * @param ContainerInterface $container
     * @return ClassroomService
     */
    public function __invoke(ContainerInterface $container)
    {
        $adapter             = $container->get('DbAdapter');
        $entityPrototype     = new ClassroomEntity();

        $mapper = new Mapper(
            $adapter,
            $entityPrototype
        );

        $mapper->setEntityTable('classroom');

        return new ClassroomService(
            $mapper,
            $entityPrototype
        );
    }
}