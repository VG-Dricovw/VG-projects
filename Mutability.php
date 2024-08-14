<?php

class Age
{
    private $age;

    public function __construct($age)
    {
        if ($age < 0 || $age > 120) {
            throw new Exception("alien check please");
        }
        $this->age = $age;
    }

    public function increments()
    {
        return new self($this->age + 1);
    }

    public function get()
    {
        return $this->age;
    }

}