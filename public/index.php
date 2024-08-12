<?php
const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . '/vendor/autoload.php';
session_start();

require BASE_PATH . 'functions.php';

$router = new \Core\Router();
$routes = require base_path('router.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);