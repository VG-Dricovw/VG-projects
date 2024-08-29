<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


include_once "../../core/initialize.php";

use App\Core\user;
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

$date = date('d/m/Y H:i:s ', time());



$data = json_decode(file_get_contents("php://input"));
// echo "<br>data:";
// var_dump($data);
// echo "<br>"; 

$user_name = substr($data->email, 0, strpos($data->email, "@"));
$user->user_name = $user_name;
$user->email = $data->email;
$user->password = $data->password;
$user->created_at = $date;
$user->updated_at = $date;


$Json = [
    "user_name" => $user->user_name,
    "email"=> $user->email,
    "password" => $user->password,
];

// var_dump($user->user_name);


if ($user_name === $json['username']) {
    echo json_encode(array("message" => "no auth", "username" => $user_arr["user_name"]));
    exit;
}


$user->token = $token;
if ($user->create()) {
    echo json_encode(array('message' => "user created"));
} else {
    echo json_encode(array("message" => "create: user not created"));
}
