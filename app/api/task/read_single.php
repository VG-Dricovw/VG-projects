<?php

header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../core/initialize.php";

use App\Core\task;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('../../../vendor/autoload.php');
$jwt = new JWT;
$headers = apache_request_headers();
foreach ($headers as $header => $value) {
    if ($header === "Authorization") {
        $token = substr($value, 7);
    }
}
$json = (array) $jwt->decode($token, new Key("token", 'HS512'));


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


if ($task_arr["user_name"] === $json['username']) {
    echo json_encode(array("message" => "no auth", "username" => $task_arr["user_name"]));
    exit;
}


print_r(json_encode($task_arr));

