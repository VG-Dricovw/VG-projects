<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


include_once "../../core/initialize.php";

 
$user = new User($db);



$data = json_decode(file_get_contents("php://input"));
// echo "<br>data:";
// var_dump($data);
// echo "<br>";
require_once("../../core/Jwt.php");

$name = substr($data->email, 0, strpos($data->email, "@"));
$user->name = $name;
$user->email = $data->email;
$user->password = $data->password;

$Json = [
    "name" => $user->name,
    "email"=> $user->email,
    "password" => $user->password,
];
$Jwt = new Jwt($user->name);
$token = $Jwt->encode($Json);

$user->token = $token;
if ($user->create()) {
    echo json_encode(array('message' => "user created"));
} else {
    echo json_encode(array("message" => "create: user not created"));
}
