<?php

class Car
{
    /**
     * @var string
     */
    public $color;
    public $make;
    public $model;

    /**
     * @var integer
     */
    public $year;

    /**
     * @var string
     */
    public $status;

    function __construct()
    {
        $this->status = "Parked";

    }

    function forward()
    {
        $this->status = "Forward";
        echo "The car is moving forward <br/><br/>";
    }

    function reverse()
    {
        $this->status = "Reverse";
        echo "The car is moving backwards <br/><br/>";
    }

    function park()
    {
        $this->status = "Park";
        echo "The car is now parked <br/><br/>";
    }

    function setColor($color)
    {
        $this->color = $color;

    }

    function getColor()
    {
        return $this->color;
    }

    function setMake($make)
    {
        $this->make = $make;
    }

    function getMake()
    {
        return $this->make;
    }

    function setModel($model)
    {
        $this->model = $model;
    }

    function getModel()
    {
        return $this->model;
    }

    function setYear($year)
    {
        $this->year = $year;
    }

    function getYear()
    {
        return $this->year;
    }
}

$myCar = new Car();

$myCar->setColor('lightblue');
$myCar->setMake('Dodge');
$myCar->setModel('Shadow');
$myCar->setYear('1994');

echo "My $myCar->make $myCar->model $myCar->year and $myCar->color.<br/>";
//echo "My $myCar->getMake $myCar->getModel $myCar->getYear and $myCar->getColor.<br/>";

$myCar->forward();
$myCar->reverse();
$myCar->park();