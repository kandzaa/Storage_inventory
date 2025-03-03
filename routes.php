<?php
require "Controller/IndexController.php";
require "Controller/LoginController.php";
require "Controller/RegisterController.php";
require "Controller/DashboardController.php";
require "Router.php";


$router = new Router();

$url = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


$router->get('/', [IndexController::class, 'index']);
$router->get('/login', [LoginController::class, 'login']);
$router->get('/register', [RegisterController::class, 'register']);
$router->get('/dashboard', [DashboardController::class, 'dashboard']);


$router->route($url, $method);