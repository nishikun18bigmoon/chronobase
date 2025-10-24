<?php
/**
 * 買取管理コントローラー
 */
require_once __DIR__ . '/../config/config.php';

class PurchaseController {

    private $pdo;

    public function __construct() {
        $this->pdo = new PDO('sqlite:' . __DIR__ . '/../../database/chronobase.db');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * 買取登録フォーム表示
     */
    public function form() {
        include __DIR__ . '/../views/purchase_form.php';
    }

    /**
     * 買取保存処理
     */
    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $stmt = $this->pdo->prepare("
                INSERT INTO purchases (brand, model, price, staff, method, created_at)
                VALUES (:brand, :model, :price, :staff, :method, datetime('now', 'localtime'))
            ");
            $stmt->execute([
                ':brand'  => $_POST['brand'] ?? '',
                ':model'  => $_POST['model'] ?? '',
                ':price'  => $_POST['price'] ?? 0,
                ':staff'  => $_POST['staff'] ?? '',
                ':method' => $_POST['method'] ?? '',
            ]);

            echo "<script>alert('買取登録が完了しました。');location.href='?route=purchase_list';</script>";
        }
    }

    /**
     * 買取一覧表示
     */
    public function list() {
        $stmt = $this->pdo->query("SELECT * FROM purchases ORDER BY id DESC");
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include __DIR__ . '/../views/purchase_list.php';
    }
}
