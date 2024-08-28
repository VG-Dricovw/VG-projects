<?php
namespace App\Api\Task;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


include_once "../../core/initialize.php";

use App\Core\token;

$token = new token($db);

$data = json_decode(file_get_contents("php://input"));
//Jwt->decode('token from endcode')

$token->user_id = $data->user_id;



if ($token->delete()) {
    echo json_encode(array('message' => "post deleted"));
} else {
    echo json_encode(array("message" => "post not deleted"));
}
