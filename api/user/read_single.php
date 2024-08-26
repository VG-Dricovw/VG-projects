<?php

header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../core/initialize.php";


$user = new User($db);

$user->id = isset($_GET["id"]) ? intval($_GET["id"]) : die();

// $user->id = $user->name $token
var_dump($_GET['token']);

$user->read_single();

$user_arr = array(
    "id" => $user->id,
    "name" => $user->name,
    "email"=> $user->email,
    "password" => $user->password,
);


print_r(json_encode($user_arr));

