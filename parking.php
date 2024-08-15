<?php

class ParkingLot
{
    public $parkingLot = [];
    public function __construct(int $size = 10) {}

    public function park(array $vehicle): bool
    {

        if (count($this->parkingLot) + count($vehicle) >= 0 && count($this->parkingLot) + count($vehicle) <= 10) {
            $this->parkingLot = array_merge($this->parkingLot, $vehicle);

            var_dump("Parked: " . array_shift($vehicle) . " ");
            echo "<br> <br>";
            return true;
        }

        var_dump("No available parking space for: " . array_shift($vehicle));
        echo "<br> <br>";
        return false;
    }

    public function retrieve(string $licence)
    {
        $this->parkingLot = array_filter($this->parkingLot, function ($v) use ($licence) {
            return $v !== $licence;
        });

        return true;
    }
}

class Vehicle
{
    public $licence;
    public $size = [];
}

class Car extends Vehicle
{
    public function __construct(string $licence = null)
    {
        $this->licence = $licence;
        $this->size = ["{$licence}", "{$licence}"];
    }
}

class Motorcycle extends Vehicle
{
    public function __construct(string $licence = null)
    {
        $this->licence = $licence;
        $this->size = ["{$licence}"];
    }
}

class Van extends Vehicle
{
    public function __construct(string $licence = null)
    {
        $this->licence = $licence;
        $this->size = ["{$licence}", "{$licence}", "{$licence}"];
    }
}


$parkingLot = new ParkingLot();

var_dump($parkingLot);
echo "<br> <br>";
$car = new Car('ABC123');
var_dump($car);
echo "<br> <br>";
$motor = new Motorcycle('XYZ456');
var_dump($motor);
echo "<br> <br>";
$van = new Van('DEF789');
var_dump($van);
echo "<br> <br>";
$parkingLot->park($car->size);
$parkingLot->park($motor->size);
$parkingLot->park($van->size);
$van2 = new Van('GHI101');
$parkingLot->park($van2->size);
$van3 = new Van('JKL112');
$parkingLot->park($van3->size);
$car2 = new Car('MNO113');
$parkingLot->park($car2->size);
var_dump($parkingLot);
echo "<br> <br>";
$parkingLot->retrieve('ABC123');
var_dump($parkingLot);
