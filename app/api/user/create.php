<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


include_once "../../core/initialize.php";

use App\Core\user;
use App\Core\Jwt;

require "../../core/jwt.php";

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
    "created_at" => $user->created_at,
    "updated_at"=> $user->updated_at
];

// var_dump($user->user_name);
$jwt = new Jwt($user->user_name); 
$token = $jwt->encode($Json);

$user->token = $token;
if ($user->create()) {
    echo json_encode(array('message' => "user created"));
} else {
    echo json_encode(array("message" => "create: user not created"));
}
