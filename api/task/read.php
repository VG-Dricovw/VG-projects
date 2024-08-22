<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../core/initialize.php";


$task = new Task($db);


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
            'name'=> $name,
            'category'=> $category,
            'est_time'=> $est_time,
            'real_time'=> $real_time,
        );
        array_push($task_arr['data'], $task_item);
    }
    echo json_encode($task_arr);
} else {
    echo json_encode(array('message '=> 'no task found'));
}