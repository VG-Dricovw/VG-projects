<?php

header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../core/initialize.php";


$task = new Task($db);

$task->id = isset($_GET["id"]) ? intval($_GET["id"]) : die();
//Jwt->decode('token from endcode')

$task->read_single();

$task_arr = array(
    "id"=> $task->id,
    "title" => $task->title,
    "name" => $task->name,
    "category" => $task->category,
    "est_time"=> $task->est_time,
    "real_time"=> $task->real_time,

);


print_r(json_encode($task_arr));

