<?php


header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

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
$user->id = isset($_GET["id"]) ? intval($_GET["id"]) : die();

// $user->id = $user->name $token
// var_dump($_GET['token']);

$user->read_single();

$user_arr = array(
    "id" => $user->id,
    "user_name" => $user->user_name,
    "email" => $user->email,
    "password" => $user->password,
    "created_at" => $user->created_at,
    "updated_at" => $user->updated_at
);

if ($user_arr["user_name"] === $json['username']) {
    echo json_encode(array("message" => "no auth", "username" => $user_arr["user_name"]));
    exit;
}

print_r(json_encode($user_arr));

