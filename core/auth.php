<?php
class Auth
{
    private $conn;

    private $table = "users";

    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($db)
    {
        $this->conn = $db;
    }



}