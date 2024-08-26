<?php

class User
{
    private $conn;

    private $table = "users";

    public $id;
    public $name;
    public $email;
    public $password;
    public $token;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        $query = 'SELECT
        id,
        name,
        email,
        password,
        token
        FROM 
        ' . $this->table . ' WHERE name = :id LIMIT 1';



        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->email = $row['email'];
        $this->password = $row['password'];
        $this->token = $row['token'];

        return $stmt;
    }

    public function create()
    {
        // var_dump("core user");
        $idquery = "SHOW TABLE STATUS LIKE '$this->table'";
        $idstmt = $this->conn->prepare($idquery);
        $idstmt->execute();

        require_once("../../core/Jwt.php");
        $Jwt = new Jwt(substr($this->email, 0, strpos($this->email, "@")));
        
        $row = $idstmt->fetch(PDO::FETCH_ASSOC);
        echo "<br><br><br>";
        $this->id = $row['Auto_increment'];


        $query = 'INSERT INTO ' . $this->table . ' SET name = :name, email = :email, password = :password';
        $tokenquery = "INSERT INTO TOKENS SET id = :id, token = :token";

        $stmt = $this->conn->prepare($query);
        $tokenstmt = $this->conn->prepare($tokenquery);

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));

        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $password_hash);
        $tokenstmt->bindParam(':token', $this->token);
        $tokenstmt->bindParam(':id', $this->id);

        // if ($stmt->execute()) {
            if ($stmt->execute() && $tokenstmt->execute()) {
            return true;
        }

        printf('error %s. /n', $stmt->error);
        // printf('error %s. /n', $tokenstmt->error);
        return false;
    }

    // public function update()
    // { 
    //     $query = 'UPDATE ' . $this->table . '
    //     SET title = :title, body = :body, author = :author, category_id = :category_id
    //     WHERE ID = :id';

    //     $stmt = $this->conn->prepare($query);

    //     $this->title = htmlspecialchars(strip_tags($this->title));
    //     $this->body = htmlspecialchars(strip_tags($this->body));
    //     $this->author = htmlspecialchars(strip_tags($this->author));
    //     $this->category_id = htmlspecialchars(strip_tags($this->category_id));
    //     $this->id = htmlspecialchars(strip_tags($this->id));

    //     $stmt->bindParam(':title', $this->title);
    //     $stmt->bindParam(':body', $this->body);
    //     $stmt->bindParam(':author', $this->author);
    //     $stmt->bindParam(':category_id', $this->category_id);
    //     $stmt->bindParam(':id', $this->id);

    //     if ($stmt->execute()) {
    //         return true;
    //     }

    //     printf('error %s. /n', $stmt->error);
    //     return false;
    // }

    // public function delete()
    // {
    //     $query = 'DELETE FROM ' . $this->table . ' WHERE ID = :id';
    //     $stmt = $this->conn->prepare($query);

    //     $this->id = htmlspecialchars(strip_tags($this->id));
    //     var_dump($this->id);


    //     $stmt->bindParam(':id', $this->id);

    //     if ($stmt->execute()) {
    //         return true;
    //     }

    //     printf('error %s. /n', $stmt->error);
    //     return false;
    // }


}