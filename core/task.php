<?php

class Task
{
    private $conn;

    private $table = "tasks";

    public $id;
    public $title;
    public $name;
    public $category;
    public $est_time;
    public $real_time;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function read()
    {
        $query = 'SELECT
        id,
        title,
        name,
        category,
        est_time,
        real_time
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
        name,
        category,
        est_time,
        real_time
        FROM
        ' . $this->table . ' WHERE id = ? LIMIT 1';


        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->title = $row['title'];
        $this->name = $row['name'];
        $this->category = $row['category'];
        $this->est_time = $row['est_time'];
        $this->real_time = $row['real_time'];

        return $stmt;
    }

    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' SET title = :title, name = :name, category = :category, est_time = :est_time, real_time = :real_time';

        $stmt = $this->conn->prepare($query);
       
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->est_time = htmlspecialchars(strip_tags($this->est_time));
        $this->real_time = htmlspecialchars(strip_tags($this->real_time));

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':est_time', $this->est_time);
        $stmt->bindParam(':real_time', $this->real_time);


        if ($stmt->execute()) {
            return true;
        }

        printf('error %s. /n', $stmt->error);
        return false;
    }

    public function update()
    {
        $query = 'UPDATE ' . $this->table . '
        SET title = :title, name = :name, category = :category, est_time = :est_time, real_time = :real_time
        WHERE ID = :id';

        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->category = htmlspecialchars(strip_tags($this->category));
        $this->est_time = htmlspecialchars(strip_tags($this->est_time));
        $this->real_time = htmlspecialchars(strip_tags($this->real_time));;

        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':category', $this->category);
        $stmt->bindParam(':est_time', $this->est_time);
        $stmt->bindParam(':real_time', $this->real_time);
        $stmt->bindParam(':id', $this->id);

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
        var_dump($this->id);


        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }

        printf('error %s. /n', $stmt->error);
        return false;
    }

    
}