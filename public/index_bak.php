<?php
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/config/routes.php';

$route = $_GET['route'] ?? 'dashboard';

switch ($route) {
    case 'dashboard':
        require_once __DIR__ . '/../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;
    default:
        echo "404 Not Found";
        break;
}
