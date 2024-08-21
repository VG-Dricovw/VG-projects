<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization ');


include_once "../../core/initialize.php";


$task = new Task($db);

$data = json_decode(file_get_contents("php://input"));
echo"data:  ";
var_dump($data);

$task->id = $data->id;
$task->name = $data->name;
$task->creator = $data->creator;
$task->category = $data->category;
$task->est_time = $data->est_time;
$task->real_time = isset($data->real_time) ? $data->real_time : null;
 
if ($task->update()) {
    echo json_encode(array('message' => "post updated"));
} else {
    echo json_encode(array("message" => "post not updated"));
}
