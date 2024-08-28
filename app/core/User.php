<?php
namespace App\Core;

use \PDO; 

class user
{
    private $conn;

    private $table = "users";

    public $id;
    public $user_name;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;
    public $token;
    public $user_id;

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
        user_name,
        email,
        password,
        created_at,
        updated_at
        FROM 
        ' . $this->table . ' WHERE id = :id LIMIT 1';



        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);

        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->user_name = $row['user_name'];
        $this->email = $row['email'];
        $this->password = $row['password'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];

        return $stmt;
    }

    public function create()
    {
        $idquery = "SHOW TABLE STATUS LIKE '$this->table'";
        $idstmt = $this->conn->prepare($idquery);
        $idstmt->execute();


        $row = $idstmt->fetch(PDO::FETCH_ASSOC);
        $this->user_id = $row['Auto_increment'];


        $query = 'INSERT INTO ' . $this->table . ' SET user_name = :user_name, email = :email, password = :password, created_at = :created_at, updated_at = :updated_at';
        $tokenquery = "INSERT INTO TOKENS SET user_id = :user_id, token = :token, created_at = :created_at, updated_at = :updated_at"; 

        $stmt = $this->conn->prepare($query);
        $tokenstmt = $this->conn->prepare($tokenquery);

        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));
        $this->updated_at = htmlspecialchars(strip_tags($this->updated_at));


        $stmt->bindParam(':user_name', $this->user_name);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);

        $tokenstmt->bindParam(':token', $this->token);
        $tokenstmt->bindParam(':user_id', $this->user_id);
        $tokenstmt->bindParam(':created_at', $this->created_at);
        $tokenstmt->bindParam(':updated_at', $this->updated_at);

        if ($stmt->execute() && $tokenstmt->execute()) {
            return true;
        }
        printf('error %s. /n', $stmt->error);
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