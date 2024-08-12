<?php


$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'provide valid email';

}

if (!Validator::password($password)) {
    $errors['password'] = 'provide valid password';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors'=> $errors,
    ]);
}

$config = require base_path('config.php');
$db = new Database($config['database']);

$user = $db->query('select * from users where email = :email', ['email'=> $email])->find();

if ($user) {
    header('location: /');
    $_SESSION['user'] = [
        'email' => $email
    ];
    exit;
} else {
    $db->query('insert into users(email, password) values (:email, :password)', [
        'email'=> $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    login($user);

    header('location: /');
    exit;
}