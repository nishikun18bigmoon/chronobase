<?php
require_once __DIR__ . '/../controllers/AuthController.php';

$routes = [
    'login' => ['controller' => 'AuthController', 'method' => 'loginForm'],
    'login_post' => ['controller' => 'AuthController', 'method' => 'login'],
    'logout' => ['controller' => 'AuthController', 'method' => 'logout'],
    'dashboard' => ['controller' => 'DashboardController', 'method' => 'index'],
];
