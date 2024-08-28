<?php
namespace App\Core;
use \PDO; 


class task
{
    private $conn;

    private $table = "tasks";

    public $id;
    public $title;
    public $user_name;
    public $category;
    public $est_time;
    public $real_time;
    public $created_at;
    public $updated_at;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function read()
    {
        $query = 'SELECT
        id,
        title,
        user_name,
        category,
        est_time,
        real_time,
        created_at,
        updated_at
        FROM
        ' . $this->table;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function read_single()
    {
        $query = 'SELECT
        id,
        title,
        user_name,
        category,
        est_time,
        real_time,
        created_at,
        updated_at
        FROM
        ' . $this->table . ' WHERE id = :id LIMIT 1';


        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $row['id'];
        $this->title = $row['title'];
        $this->user_name = $row['user_name'];
        $this->category = $row['category'];
        $this->est_time = $row['est_time'];
        $this->real_time = $row['real_time'];
        $this->created_at = $row['created_at'];
        $this->updated_at = $row['updated_at'];

        return $stmt;
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' SET title = :title, user_name = :user_name, category = :category, est_time = :est_time, real_time = :real_time, created_at = :created_at, updated_at = :updated_at';

        $stmt = $this->conn->prepare($query);
       

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->est_time = htmlspecialchars(strip_tags($this->est_time));
        $this->real_time = htmlspecialchars(strip_tags($this->real_time));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));
        $this->updated_at = htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':user_name', $this->user_name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':est_time', $this->est_time);
        $stmt->bindParam(':real_time', $this->real_time);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);


        if ($stmt->execute()) {
            return true;
        }

        printf('error %s. /n', $stmt->error);
        return false;
    }

    public function update()
    {
        $query = 'UPDATE ' . $this->table . '
        SET title = :title, user_name = :user_name, category = :category, est_time = :est_time, real_time = :real_time, created_at = :created_at, updated_at = :updated_at
        WHERE ID = :id';

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->est_time = htmlspecialchars(strip_tags($this->est_time));
        $this->real_time = htmlspecialchars(strip_tags($this->real_time));
        $this->created_at = htmlspecialchars(strip_tags($this->created_at));
        $this->updated_at = htmlspecialchars(strip_tags($this->updated_at));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':user_name', $this->user_name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':est_time', $this->est_time);
        $stmt->bindParam(':real_time', $this->real_time);
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':created_at', $this->created_at);
        $stmt->bindParam(':updated_at', $this->updated_at);

        if ($stmt->execute()) {
            return true;
        }

        printf('error %s. /n', $stmt->error);
        return false;
    }

    public function delete() {

        $query = 'DELETE FROM '. $this->table . ' WHERE ID = :id';
        $stmt = $this->conn->prepare($query);

        $this->id = htmlspecialchars(strip_tags($this->id));
        // var_dump($this->id);


        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf('error %s. /n', $stmt->error);
        return false;
    }

    
}