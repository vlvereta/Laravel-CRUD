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

    public function __construct($id, $name, $shortName, $actualCourse, $actualCourseDate, $active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->actualCourse = $actualCourse;
        $this->actualCourseDate = $actualCourseDate;
        $this->active = $active;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getShortName() {
        return $this->shortName;
    }

    public function getActualCourse() {
        return $this->actualCourse;
    }

    public function getActualCourseDate() {
        return $this->actualCourseDate;
    }

    public function isActive() {
        return $this->active;
    }
}
