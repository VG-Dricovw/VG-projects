<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../../core/initialize.php";


$user = new User($db);

// var_dump(  "heldklfsldkf");

$result = $user->read();

$num = $result->rowCount();

if ($num > 0) {
    $user_arr = array();
    $user_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $user_item = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => $password
        );
        array_push($user_arr['data'], $user_item);
    }
    echo json_encode($user_arr);
} else {
    echo json_encode(array('message '=> 'no user found'));
}