<?php

namespace Classroom\Service;

use Common\Db\Traits\FindByIdTrait;
use Common\Service\AbstractService;
use Common\Service\ServiceInterface;

class ClassroomService extends AbstractService implements
    ServiceInterface
{
    use FindByIdTrait;
}
