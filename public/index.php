<?php
// ==============================================
// ChronoBase メインルーティング
// ==============================================
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/core/Session.php';

$route = $_GET['route'] ?? 'dashboard';

// セッション開始
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ==============================================
// ルーティング定義
// ==============================================
switch ($route) {

    // ------------------------------------------
    // ダッシュボード
    // ------------------------------------------
    case 'dashboard':
        if (empty($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: ?route=login');
            exit;
        }
        require_once __DIR__ . '/../app/controllers/DashboardController.php';
        $controller = new DashboardController();
        $controller->index();
        break;

    // ------------------------------------------
    // ログイン画面／ログイン処理
    // ------------------------------------------
    case 'login':
        require_once __DIR__ . '/../app/controllers/AuthController.php';
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login();
        } else {
            $controller->loginForm();
        }
        break;

    // ------------------------------------------
    // ログアウト
    // ------------------------------------------
    case 'logout':
        session_destroy();
        header('Location: ?route=login');
        exit;

    // ------------------------------------------
    // 売上登録フォーム
    // ------------------------------------------
    case 'sales_form':
        require_once __DIR__ . '/../app/controllers/SalesController.php';
        $controller = new SalesController();
        $controller->form();
        break;

    // 売上保存処理
    case 'sales_save':
        require_once __DIR__ . '/../app/controllers/SalesController.php';
        $controller = new SalesController();
        $controller->save();
        break;

    // 売上一覧
    case 'sales_list':
        require_once __DIR__ . '/../app/controllers/SalesController.php';
        $controller = new SalesController();
        $controller->list();
        break;

    // ------------------------------------------
    // 買取登録フォーム
    // ------------------------------------------
    case 'purchase_form':
        require_once __DIR__ . '/../app/controllers/PurchaseController.php';
        $controller = new PurchaseController();
        $controller->form();
        break;

    // 買取保存処理
    case 'purchase_save':
        require_once __DIR__ . '/../app/controllers/PurchaseController.php';
        $controller = new PurchaseController();
        $controller->save();
        break;

    // 買取一覧
    case 'purchase_list':
        require_once __DIR__ . '/../app/controllers/PurchaseController.php';
        $controller = new PurchaseController();
        $controller->list();
        break;

    // ------------------------------------------
    // デフォルト（404）
    // ------------------------------------------
    default:
        http_response_code(404);
        echo "<h2>404 Not Found</h2><p>指定されたページは存在しません。</p>";
        break;
}
