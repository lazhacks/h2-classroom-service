<?php

namespace Classroom\Factory;

use Classroom\Collection\ClassroomCollection;
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
        $collectionPrototype = new ClassroomCollection();

        $mapper = new Mapper(
            $adapter,
            $entityPrototype,
            null,
            $collectionPrototype
        );

        $mapper->setEntityTable('classroom');

        return new ClassroomService(
            $mapper,
            $entityPrototype
        );
    }
}