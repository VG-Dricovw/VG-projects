<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


include_once "../../core/initialize.php";


$user = new User($db);



$data = json_decode(file_get_contents("php://input"));


$user->name = substr($data->email, 0, strpos($data->email, "@"));
$user->email = $data->email;
$user->password = $data->password;

$payload = [
    "id"=> $user->id,
    "name" => $user->name,
];

// $JwtController = new JWT($_ENV["SECRET_KEY"]);

// $token = $$JwtController->encode($payload);

// echo json_encode(["token" => $token]);

if ($user->create()) {
    echo json_encode(array('message' => "user created"));
} else {
    echo json_encode(array("message" => "user not created"));
}
