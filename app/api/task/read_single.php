<?php

header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../core/initialize.php";

use App\Core\task;

$task = new task($db);

$task->id = isset($_GET["id"]) ? intval($_GET["id"]) : die();
//Jwt->decode('token from endcode')

$task->read_single();

$task_arr = array(
    "id"=> $task->id,
    'title' => $task->title,
    'user_name' => $task->user_name,
    'category' => $task->category,
    'est_time' => $task->est_time,
    'real_time' => $task->real_time,
    "created_at" => $task->created_at,
    "updated_at" => $task->updated_at

);


print_r(json_encode($task_arr));

