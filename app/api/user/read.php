<?php


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../core/initialize.php";

use App\Core\User;
//include
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


$user = new user($db);
$result = $user->read();
$num = $result->rowCount();



if ($num > 0) {
    $user_arr = array();
    $user_arr['data'] = array();
    $username_arr = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            'id' => $id,
            "user_name" => $user_name,
            "email" => $email,
            "password" => $password,
            "created_at" => $created_at,
            "updated_at" => $updated_at
        );
        array_push($user_arr['data'], $user_item);
        array_push($username_arr, $user_item['user_name']);
    }
    foreach ($username_arr as $username) {
        if (!$username === $json['username']) {
            echo json_encode(array("message" => "no auth", "username" => $user_item["user_name"]));
            exit;
        }
    }
    echo json_encode($user_arr['data']);
} else {
    echo json_encode(array('message ' => 'no users found'));
}