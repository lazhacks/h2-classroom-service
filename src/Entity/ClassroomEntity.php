<?php

namespace Classroom\Entity;

use Common\Entity\EntityInterface;

class ClassroomEntity implements EntityInterface
{
    /** @var int */
    private $id;

    /** @var int */
    private $teacherId;

    /** @var int */
    private $studentId;

    /** @var int */
    private $schoolId;

    /**
     * @return bool
     */
    public function isValid()
    {
        return !!$this->id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getTeacherId()
    {
        return $this->teacherId;
    }

    /**
     * @param int $teacherId
     */
    public function setTeacherId($teacherId)
    {
        $this->teacherId = $teacherId;
    }

    /**
     * @return int
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * @param int $studentId
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
    }

    /**
     * @return int
     */
    public function getSchoolId()
    {
        return $this->schoolId;
    }

    /**
     * @param int $schoolId
     */
    public function setSchoolId($schoolId)
    {
        $this->schoolId = $schoolId;
    }
}
