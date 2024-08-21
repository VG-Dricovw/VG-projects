<?php

$email = $_POST['email'];
$password = $_POST['password'];


$errors = [];
use Validator;



if (!$user) {
    return view('login/create.view.php', [
        'errors' => [
            'email' => 'no matching account found',
        ]
    ]);
}

// dd( password_verify($password, $user['password'] ));

if (password_verify($password, $user['password'])) {
    login([
        "email" => $email,
    ]);
    header("location: /");
    exit;
}

return view('login/create.view.php', [
    'errors' => [
        'email' => 'no matching account or password found',
    ]
]);