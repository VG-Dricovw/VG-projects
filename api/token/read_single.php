<?php

header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../core/initialize.php";


$token = new Token($db);

$token->id = isset($_GET["id"]) ? intval($_GET["id"]) : die();

// $token->id = $token->name $token
// var_dump($token->id);

$token->read_single();

$token_arr = array(
    "id" => $token->id,
    "token" => $token->token
);


print_r(json_encode($token_arr));

