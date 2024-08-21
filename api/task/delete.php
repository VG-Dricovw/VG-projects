<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


include_once "../../core/initialize.php";


$task = new Task($db);

$data = json_decode(file_get_contents("php://input"));
// echo "data: ";
// var_dump($data[0]);
// echo "<br>";
$task->id = $data[0];



if ($task->delete()) {
    echo json_encode(array('message' => "post deleted"));
} else {
    echo json_encode(array("message" => "post not deleted"));
}
