<?php

namespace App\Services;

class Currency
{
    private $id;
    private $name;
    private $shortName;
    private $actualCourse;
    private $actualCourseDate;
    private $active;

    public function __construct($id, string $name, string $shortName, float $actualCourse, $actualCourseDate, bool $active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->actualCourse = $actualCourse;
        $this->actualCourseDate = $actualCourseDate;
        $this->active = $active;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getShortName() : string
    {
        return $this->shortName;
    }

    public function getActualCourse() : float
    {
        return $this->actualCourse;
    }

    public function getActualCourseDate()
    {
        return $this->actualCourseDate;
    }

    public function isActive() : bool
    {
        return $this->active;
    }
}