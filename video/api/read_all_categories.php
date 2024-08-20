<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once "../core/initialize.php";


$categories = new Category($db);


$result = $categories->read();

$num = $result->rowCount();

if ($num > 0) {
    $category_array = array();
    $category_array['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $category_item = array(
            'id' => $id,
            'name'=> $name,
            'created_at' => $created_at,
            
        );
        array_push($category_array['data'], $category_item);
    }
    echo json_encode($category_array);
} else {
    echo json_encode(array('message ' => 'no categories found'));
}