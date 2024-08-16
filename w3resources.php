<?php


abstract class Shape
{

    abstract public function calculateArea();
}

class Rectangle extends Shape {
    public $length;
    public $width;
    
    public function __construct($width, $length) {
        $this->width = $width;
        $this->length = $length;
    }

    public function calculateArea() {
        $result = $this->width * $this->length;

        return $result;
    }

    public function calculatePerimiter() {
        $result = (2 * $this->width) + (2 * $this->length);
        return $result;
    }
}

class Circle extends Shape {
    public $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function calculateArea() {
        $result = pi() * pow($this->radius, 2);

        return $result;
    }

    public function calculatePerimiter() {
        $result = 2 * pi() * $this->radius;
        return $result;
    }
}

interface resizeable {
    public function resize($width, $height);
}

class Square implements resizeable {
    public $width;
    public $length;

    public function __construct($width, $length) {
        $this->width = $width;
        $this->length = $length;
    }


    public function resize($width, $height) {
        $this->width = $width;
        $this->length = $height;
    }
}

class Vehicle {
    public $brand;
    public $model;
    public $year;

    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getVehicleDetails() {
        $vehicleDetails = [];
        array_push($details, $this->brand, $this->model, $this->year);
        return $vehicleDetails;
    }
}

class LibraryItem {
    public $name;
    public $description;
    public $quantity;
    public $yearOfRelease;

    public function __construct($name, $description, $quantity, $yearOfRelease) {
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->yearOfRelease = $yearOfRelease;
    }
}

class Book extends LibraryItem {
    public $name;
    public $description;
    public $quantity;
    public $yearOfRelease;
    public $pages;

    public function __construct($name, $description, $quantity, $yearOfRelease) {
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->yearOfRelease = $yearOfRelease;
    }

    public function read() {
        return $this->pages;
    }

}

class DVD extends LibraryItem {
    public $name;
    public $description;
    public $quantity;
    public $yearOfRelease;
    public $movie;

    public function __construct($name, $description, $quantity, $yearOfRelease) {
        $this->name = $name;
        $this->description = $description;
        $this->quantity = $quantity;
        $this->yearOfRelease = $yearOfRelease;
    }

    public function watch() {
        return $this->movie;
    }
}

class Student {
    public $name;
    public $age;
    public $grade;

    public function __construct($name, $age, $grade) {
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
    }

    public function getInformation() {
        return array($this->name, $this->age, $this->grade );
    }
}

class BankAccount {
    public $accountNumber;
    public $balance;

    public function __construct($accountNumber, $balance) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
    }

    public function deposit($money) {
        $this->balance += $money;

    }

    public function withdraw($money) {
        $this->balance -= $money;
    }
}

abstract class Animal {

    abstract public function eat();
    abstract public function makeSound();
}

class Dog extends Animal {
    public function eat() {
        return "meat pls :D";
    }

    public function makeSound() {
        return "bark woof";
    }
}

class Cat extends Animal {
    public function eat() {
        return "fisshis :P";
    }

    public function makeSound() {
        return "no hablo ingles";
    }

}

class Bird extends Animal {
    public function eat() {
        return "fries >:)";
    }

    public function makeSound() {
        return "kakakaka";
        
    }
}

class Person {
    public $name;
    public $age;

    public function __tostring() {
        return "my name is :". $this->name ."tengo anos". $this->age;
    }
}

class Employee extends Person {
    public $name;
    public $age;
    public $salary;
    public $position;

    public function __tostring() {
        return "my name". $this->name ."si" . $this->salary . "tienes mas dolares" . $this->position . "nesecito trabajo mucho ser un jefe";
    }
}


interface Comparable {

    public function compare(Comparable $other);
}

class Product implements Comparable {
    public $name;
    public $price;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function compare(Comparable $otherProduct) {
        if ($this->price > $otherProduct->price) {
            return "$this->name is more expensive";
        } else {
            return "$otherProduct->name is more expensive";
        }
}
}

// class Logger {
//     public static $logCount;

//     public static function logMessage($message) {
//         echo $message;
//         self::$logCount +=1;
//     }
// }

class Math {

    public static function add($var1, $var2) {
        return $var1 + $var2;
    }

    public static function subtract($var1, $var2) {
        return $var1 - $var2;
    }

    public static function multiply($var1, $var2) {
        return $var1 * $var2;
    }
}


class File {
    public $name;
    public $size;
 
    public static function calculateTotalSizeOfFiles($files) {
        $total = 0;
        foreach ($files as $file) {
            $total += $file->size;
        }

        return $total;
    }
}

class Calculator {
    private $result;

    public function add($var1 , $var2) {
        $this->result += $var1 * $var2;
    }

    public function subtract($var1, $var2) {
        $this->result -= $var1 * $var2;
    }

    public function getResult() {
        return $this->result;
    }
}

class ShoppingCart {
    public $items = [];
    public $total;

    public function addItemToCart($item) {
        $this->items[] = $item;
        $this-> total += $item->value;
    }

    public function getTotalCost() {
        return $this->total;
    }
}

class Logger {
    private static $instance;
    private $logs;

    private function __construct() {
        $this->logs = [];
    }

    public static function getInstance() {
        if (self::$instance === null) {
        self::$instance = new Logger();
        }

        return self::$instance;
    }

    public function log($message) {
        $this->logs[] = $message;
    }

    public function getLogs() {
        return $this->logs;
    }
}


class Validation {
    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validatePassword($password) {
        return strlen(trim($password)) >= 8;
    }

    public static function validateUsername($username) {
        return !empty($username);
    }
}