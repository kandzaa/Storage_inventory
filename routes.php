<?php
require "controllers/IndexController.php";
require "controllers/LoginController.php";
require "Router.php";
use controllers\IndexController;
use controllers\LoginController;

$router = new Router();

$url = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Define routes
$router->get('/', [IndexController::class, 'index']);

$router->get('/login', [LoginController::class, 'login']);
// Handle request
$router->route($url, $method);