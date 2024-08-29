<?php
namespace App\Api\Task;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
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

$data = json_decode(file_get_contents("php://input"));
//Jwt->decode('token from endcode')

$task->id = $data->id;

if (!$task->user_name === $json['username']) {
    echo json_encode(array("message" => "no auth", "username" => $task->user_name["user_name"]));
    exit;
}


if ($task->delete()) {
    echo json_encode(array('message' => "post deleted"));
} else {
    echo json_encode(array("message" => "post not deleted"));
}
