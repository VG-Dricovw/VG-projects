<?php
require base_path('Core/Validator.php');
$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
        
    
    if (!$Validator::body($_POST['body'], 1, 1000)) {
        $errors['body'] = 'a body is required with more than 100 chars';
    }
    if ($_POST['user_id'] !== null) {
            $errors['user_id'] = 'fill in the user id';
    }
    if (empty($errors)) {
                $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
                    'body' => $_POST['body'],
                    'user_id' => $_POST['user_id'],
                ]);
            }
        }


view("notes/create.view.php" , [
    "heading" => 'make your own note',
    'errors'=> $errors,
]);