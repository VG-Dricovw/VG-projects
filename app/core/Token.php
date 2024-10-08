<?php
namespace App\Core;

use \PDO;

class Token
{
    private $conn;

    private $table = "tokens";

    public $user_id;
    public $token;
    public $created_at;
    public $updated_at;

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
        user_id,
        token,
        created_at,
        updated_at
        FROM 
        ' . $this->table . ' WHERE user_id = :user_id LIMIT 3';



        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->execute();
        // var_dump( $this->user_id);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->token = $row['token'];
        $this->user_id = $row['user_id'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];

        return $stmt;
    }

    // public function create()
    // {
    //     // var_dump("core user");
    //     $idquery = "SHOW TABLE STATUS LIKE '$this->table'";
    //     $idstmt = $this->conn->prepare($idquery);
    //     $idstmt->execute();

        
    //     $row = $idstmt->fetch(PDO::FETCH_ASSOC);
    //     echo "<br><br><br>";
    //     $this->id = $row['Auto_increment'];


    //     $query = 'INSERT INTO ' . $this->table . ' SET name = :name, email = :email, password = :password';
    //     $tokenquery = "INSERT INTO TOKENS SET id = :id, token = :token";

    //     $stmt = $this->conn->prepare($query);
    //     $tokenstmt = $this->conn->prepare($tokenquery);

    //     $this->name = htmlspecialchars(strip_tags($this->name));
    //     $this->email = htmlspecialchars(strip_tags($this->email));
    //     $this->password = htmlspecialchars(strip_tags($this->password));

    //     $password_hash = password_hash($this->password, PASSWORD_DEFAULT);

    //     $stmt->bindParam(':name', $this->name);
    //     $stmt->bindParam(':email', $this->email);
    //     $stmt->bindParam(':password', $password_hash);
    //     $tokenstmt->bindParam(':token', $this->token);
    //     $tokenstmt->bindParam(':id', $this->id);

    //     // if ($stmt->execute()) {
    //         if ($stmt->execute() && $tokenstmt->execute()) {
    //         return true;
    //     }

    //     printf('error %s. /n', $stmt->error);
    //     // printf('error %s. /n', $tokenstmt->error);
    //     return false;
    // }

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

    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE user_id = :user_id';
        $stmt = $this->conn->prepare($query);

        $this->user_id = htmlspecialchars(strip_tags($this->user_id));
        // var_dump($this->id);


        $stmt->bindParam(':user_id', $this->user_id);

        if ($stmt->execute()) {
            return true;
        }

        printf('error %s. /n', $stmt->error);
        return false;
    }


}