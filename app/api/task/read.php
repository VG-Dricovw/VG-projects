<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

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


$result = $task->read();

$num = $result->rowCount();

if ($num > 0) {
    $task_arr = array();
    $task_arr['data'] = array();
    $username_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $task_item = array(
            'id' => $id,
            'title' => $title,
            'user_name'=> $user_name,
            'category'=> $category,
            'est_time'=> $est_time,
            'real_time'=> $real_time,
            "created_at" => $created_at,
            "updated_at"=> $updated_at
        );
        array_push($task_arr['data'], $task_item);
        array_push($username_arr, $task_item['user_name']);
    }
    foreach ($username_arr as $username) {
        if (!$username === $json['username']) {
            echo json_encode(array("message" => "no auth", "username" => $task_item["user_name"]));
            exit;
        }
    }
    echo json_encode($task_arr);
} else {
    echo json_encode(array('message '=> 'no task found'));
}