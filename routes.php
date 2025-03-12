<?php
require "session.php";
require "Controller/IndexController.php";
require "Controller/AuthController.php";
require "Controller/DashboardController.php";
require "Controller/InventoryController.php";
require "Controller/ProductsController.php";
require "Controller/OrdersController.php";
require "Controller/AdminController.php";
require "Controller/ReportController.php";


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

$router->get('/products/add', [ProductsController::class, 'create']);
$router->post('/products/add/store', [ProductsController::class, 'store']);
$router->post('/products/remove', [ProductsController::class, 'remove']);
$router->get('/products/edit', [ProductsController::class, 'edit']);
$router->post('/products/edit/process', [ProductsController::class, 'update']);
$router->post('/admin/save', [AdminController::class, 'saveUser']);

$router->get('/orders', [OrdersController::class, 'orders']);
$router->get('/admin', [AdminController::class, 'show']);
$router->get('/report', [ReportController::class, 'index']);
$router->post('/report/generate', [ReportController::class, 'generateReport']);



$router->route($url, $method);
