<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../core/initialize.php";

use App\Core\task;

$task = new task($db);


$result = $task->read();

$num = $result->rowCount();

if ($num > 0) {
    $task_arr = array();
    $task_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $task_item = array(
            'id' => $id,
            'title' => $title,
            'user_name'=> $user_name,
            'category'=> $category,
            'est_time'=> $est_time,
            'real_time'=> $real_time,
            "created_at" => $created_at,
            "updated_at"=> $updated_at
        );
        array_push($task_arr['data'], $task_item);
    }
    echo json_encode($task_arr);
} else {
    echo json_encode(array('message '=> 'no task found'));
}