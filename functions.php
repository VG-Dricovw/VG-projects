<?php

function dd($value)
{
    echo "
<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code, $message) {
    http_response_code($code);
    require "views/errors/{$code}.php";
    echo $message;
    die();
}


function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404, 'did not find page');
    }
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort(403, $status);
    }

}
function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);
    require base_path("views/" . $path);
}

function stopSession() {
    session_destroy();
}

function login($user) {
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout()  {
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

}

function redirect($path) {
    header("location: {$path}");
    exit;
}