<?php

class Author {
    public $name = "Donald";
    public $age = 17;
    public $gender = "duck";
    public $occupation = "web developer";
    public $ifString = "mega yapper about things";
}

class ObjectOrientedPrinciple {
    public $description = "just a discriptionn";
    public $kata_list = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    public $kata_count = 10;
    public $author;

    public function advertise($name) {
        return "hey $name, Check out my latest blog post";
    }

    public function getKataNumber(int $kata_number) {
        return $this->kata_list[$kata_number];
    }

    public function complete() {
        return "Hooray, I've finally completed the Object Oriented Principles kata!";
    }

    public function __toString()
    {
        return $this->description;
    }
}

$object_oriented_principle = new ObjectOrientedPrinciple();
$object_oriented_principle->author = new Author();

echo ("$object_oriented_principle");

echo "<br>";









abstract class badPerson {
    public $name;
    public $age;
    public $gender;

    public function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    abstract public function introduce();

    public function greet($name) {
        return "Hello $name";
    }
}


final class Child extends Person {
    public $aspirations = [];

    public function __construct($name, $age, $gender, $aspirations) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->aspirations = $aspirations;
    }

    public function introduce() {
        return "Hello, my name is $this->name and I am $this->age years old";
    }

    public function greet($name)
    {
        return "Hi $name, let's play!";
    }

    public function sayDreams() {
        
        return "I want to be a(n) " . implode(", ", array_pop($this->aspirations)) . "or" . end($this->aspirations) .  " when I grow up.";
    }
}

class ComputerProgrammer extends Person {
    public $occupation = "computer Programmer";

    public function __construct($name, $age, $gender) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function introduce() {
        return "Hello, my name is $this->name and I am a $this->occupation";
    }

    public function greet($name)
    {
        return "hello $name, i am $this->name que pasa?";   
    }

    public function advertise() {
        return "Don't forget to check out my coding projects";
    }
}













 interface canFly {
    public function fly();
}

interface canSwim {
    public function swim();
}

interface canClimb {
    public function climb();
}

interface canGreet {
    public function greet($name);
}

interface CanIntroduce {
    public function introduce();
    public function speak();
}

interface CanSpeak {
    public function speak();
}

class Bird implements canFly {
    public $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function fly() {
        return "I am flying";
    }

    public function chirp() {
        return "I am chirping";
    }   
}

class Duck extends Bird {
    public function __construct($name) {
        $this->name = $name;
    }

    public function swim() {
        return "I am swimming";
    }

    public function chirp()
    {
        return "I am quacking";
    }

    public function fly()
    {
        return "I am flying";
    }
}

class Cat implements canClimb {
    public function climb() {
        return "I am climbing";
    }

    public function meow() {
        return "I am meowing";
    }

    public function play($name) {
        return "I am playing with $name";
    }
}

class Dog implements canSwim, canGreet {
    public function swim() {
        return "I am swimming woof";
    }

    public function greet($name) {
        return "Hello $name";
    }

    public function bark() {
        return "wwwwooooooooofffff";
    }
}

class eightPerson implements canGreet, CanIntroduce {
    public $name;
    public $age;
    public $occupation;

    public function __construct($name, $age, $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function greet($name) {
        return "Hello $name";
    }

    public function speak()
    {
        return "I am speaking";
    }

    public function introduce() {
        return "Hello, my name is $this->name, i am $this->age years old and i am a $this->occupation";
    }
}




class sevenPerson 
{
    const species = 'Homo siepiens';
    public $name;
    public $age;
    public $occupation;

    public function __construct($name,$age, $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function introduce() {
        return "hello my name is $this->name";
    }

    public final function desribeJob() {
        return "I am currently working at $this->occupation";
    }

    public static final function greetAliens($species): string {
        return "welcome to earth, $species";
    }
}

class eightComputerProgrammer extends eightPerson
{
    public function introduce()
    {
        return "hello, i am $this->name and i work at $this->occupation";
    }

}














class SixPerson 
{

    protected $name;
    protected $age;
    protected $occupation;

    public function __construct(String $name,int $age,String $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getOccupation() {
        return $this->occupation;
    }

    public function setName(String $name) {
        $this->name = $name;
    }

    public function setAge(int $age) {
        $this->age = $age;
    }

    public function setOccupation(string $occupation) {
        $this->occupation = $occupation;
    }

    
}











class Salesman extends eightPerson {
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = 'Salesman';
    }

    public function introduce() {
        return "Hello, my name is $this->name and I am a $this->occupation";
    }
}

class oldComputerProgrammer extends eightPerson {
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = 'Computer Programmer';
        
    }
    
    public function describe_job() {
        return "Hello, my name is $this->name and I am a $this->occupation";
    }   
}

class WebDeveloper extends oldComputerProgrammer  { 
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = 'Web Developer';
    }
    
    public function describe_job() {
        return "Hello, my name is $this->name and I am a $this->occupation";
    }

    public function describe_website() {
        return "I build websites!";
    }
}




class FourPerson 
{
    const species = 'Homo siepiens';
    public $name;
    public $age;
    public $occupation;

    public function __construct($name,$age, $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }

    public function introduce() {
        return "hello my name is $this->name";
    }

    public function desribeJob() {
        return "I am currently working at $this->occupation";
    }

    public static function greetAliens($species): string {
        return "welcome to earth, $species";
    }
}







class CurrentUSPresident
 {
    const name = "Barack Obama";

    public static function greet($name = 'Mr. President')
    {
        echo "Hello $name, I am " . CurrentUSPresident::name . ", the president";
    }
 }


$us_president = new President();
$presidnet_name = $us_president->name;
$greetings = $us_president->greet('Donald Trump');



class SecondPerson 
{
    public $firstName;
    public $lastName;

    public function __construct($firstName, $lastName) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullName() {
        return $this->firstName . ' ' . $this->lastName;
        
    }
}



class President
 {
    public $name = "Barack Obama";

    public function greet($name = 'Mr. President')
    {
        echo "Hello $name, I am $this->name, the president";
    }
 }


$us_president = new President();
$presidnet_name = $us_president->name;
$greetings = $us_president->greet('Donald Trump');