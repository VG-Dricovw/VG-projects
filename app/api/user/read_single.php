<?php


header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../core/initialize.php";

use App\Core\user;

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


print_r(json_encode($user_arr));

