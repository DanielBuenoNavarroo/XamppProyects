<?php
class Persona
{
    private $name;
    private $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function get_nombre_age()
    {
        return $this->name . $this->age;
    }
}
