<?php
require "Controller/IndexController.php";
require "Controller/AuthController.php";
require "Controller/DashboardController.php";
require "Controller/InventoryController.php";
require "Router.php";


$router = new Router();

$url = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


$router->get('/', [IndexController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login/process', [AuthController::class, 'processLogin']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register/process', [AuthController::class, 'processRegistration']);
$router->get('/dashboard', [DashboardController::class, 'dashboard']);
$router->get('/inventory', [InventoryController::class, 'inventory']);



$router->route($url, $method);
