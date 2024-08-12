<?php

$config = require base_path('config.php');
$db = new Database($config['database']);
$user_id = 1;




$note = $db->query('select * from notes where id = :id', [':id' => $_GET['id']])->find();

authorize($note['user_id'] === 1);


view("notes/show.view.php" , [
    'heading' => 'one note',
    'note'=> $note
]);