<?php
namespace App\Api\Task;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


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

$date = date('d/m/Y H:i:s ', time());

$data = json_decode(file_get_contents("php://input"));
// var_dump($data);
//Jwt->decode('token from endcode')
// var_dump($data);

$task->id = $data->id;
$task->title = $data->title;
$task->user_name = $data->user_name;
$task->category = $data->category;
$task->est_time = $data->est_time;
$task->real_time = isset($data->real_time) ? $data->real_time : null;
$task->created_at = $date;
$task->updated_at = $date;


if (!$task->user_name === $json['username']) {
    echo json_encode(array("message" => "no auth", "username" => $task->user_name["user_name"]));
    exit;
}

if ($task->update()) {
    echo json_encode(array('message' => "post updated"));
} else {
    echo json_encode(array("message" => "post not updated"));
}
