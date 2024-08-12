<?php
// view('login/store.view.php');
$config = require base_path('config.php');
$db = new Database($config['database']);


$email = $_POST['email'];
$password = $_POST['password'];

// $form = new Database($config['database']);
$errors = [];
use Validator;

if (!Validator::email($email)) {
    $this->errors['email'] = 'provide valid email';

}

if (!Validator::password($password)) {
    $this->errors['password'] = 'provide valid password';
}



$user = $db->query('select * from users where email = :email', ['email' => $email])->find();


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