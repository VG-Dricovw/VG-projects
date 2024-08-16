<?php

class VersionManager
{
    public $version = [];

    public $update = [];

    public function __construct($newVersion = ["0.0.1"]) {
        array_push($this->version, $newVersion);
    }

    public function major() {
        echo "major:";
        echo "<br> start: ";
        $string = end($this->version);
        echo $string;

        $string = substr_replace($string, mb_substr($string, 0, 1) + 1, 0, 1);

        $string = substr_replace($string, "0", 2, 1);
        $string = substr_replace($string, "0", 4, 1);

        echo "<br> result: ";
        echo $string;
        array_push($this->version, $string);
        array_push($this->update, "major");
        array_push($this->version);
    }

    public function minor()
    {
        echo "<br><br>minor:";
        echo "<br> start:  ";
        $string = end($this->version);
        echo $string;
        $string = substr_replace($string, mb_substr($string, 2, 1) + 1, 2, 1);
        $string = substr_replace($string, "0", 4, 1);
        
        echo "<br> result: ";
        echo $string;
        array_push($this->version, $string);
        array_push($this->update, "minor");
    }

    public function patch()
    {
        echo "<br><br>patch:";
        echo "<br> start:  ";
        $string = end($this->version);
        echo $string;
        $string = substr_replace($string, mb_substr($string, 4, 1) + 1, 4, 1);
        echo "<br> result: ";
        echo $string;
        array_push($this->version, $string);
        array_push($this->update, "patch");
    }

    public function lastUpdate()
    {
        $method = end($this->update);
       
        if (end($this->update) == "") {
            return "error";
        }
        array_pop($this->update);
        return $method;
    }

    public function rollback() {
        $result = $this->lastUpdate();
        if ($result === "error") {
            die("cannot rollback");
        }
        echo "last used method:  " . $result . "<br>";
        array_pop($this->version);
        var_dump(end($this->version));
    }


     public function checkRelease() {
        return end($this->version);
     }

     
}

$v = new VersionManager("1.3.1");

echo "start version:   ";
var_dump($v->version);
echo "<br><br>";

$v->major();

$v->minor();

$v->patch();
echo "<br><br>";
var_dump($v->version);
echo "<br>";

echo "<br>" . $v->rollback();
echo "<br>" . $v->rollback();
echo "<br>" . $v->rollback();
echo "<br>" . $v->rollback();