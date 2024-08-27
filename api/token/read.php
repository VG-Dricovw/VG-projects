<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../core/initialize.php";


$token = new Token($db);


$result = $token->read();

$num = $result->rowCount();

if ($num > 0) {
    $token_arr = array();
    $token_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $token_item = array(
            'id' => $id,
            'token' => $token,
        );
        array_push($token_arr['data'], $token_item);
    }
    echo json_encode($token_arr);
} else {
    echo json_encode(array('message '=> 'no tokentoken found'));
}