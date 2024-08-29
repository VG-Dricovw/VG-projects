<?php
namespace App\Api\Task;

header("Acces-Control-Allow-Origin: *");
header("Content-Type: application/json");

include_once "../../core/initialize.php";

use App\Core\token;

$token = new token($db);
$token->user_id = isset($_GET["id"]) ? intval($_GET["id"]) : die();

// $token->id = $token->name $token
// var_dump($token->id);

$token->read_single();

$token_arr = array(
    "user_id" => $token->user_id,
    "token" => $token->token,
    "created_at" => $token->created_at,
    "updated_at"=> $token->updated_at
);


print_r(json_encode($token_arr));

