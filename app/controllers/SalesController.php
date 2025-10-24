<?php
require_once __DIR__ . '/../config/config.php';

class SalesController {

    // フォーム表示
    public function form() {
        include __DIR__ . '/../views/sales_form.php';
    }

    // 登録処理
    public function save() {
        try {
            // SQLite データベースに接続
            $db = new PDO('sqlite:' . __DIR__ . '/../../database/chronobase.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // SQL: 販売日 (sale_date) を追加して保存
            $stmt = $db->prepare('
                INSERT INTO sales (product_id, brand, model, price, staff, destination, method, sale_date, created_at)
                VALUES (:product_id, :brand, :model, :price, :staff, :destination, :method, :sale_date, datetime("now", "localtime"))
            ');

            $stmt->execute([
                ':product_id'   => $_POST['product_id'] ?? '',
                ':brand'        => $_POST['brand'] ?? '',
                ':model'        => $_POST['model'] ?? '',
                ':price'        => $_POST['price'] ?? 0,
                ':staff'        => $_POST['staff'] ?? '',
                ':destination'  => $_POST['destination'] ?? '',
                ':method'       => $_POST['method'] ?? '',
                ':sale_date'    => $_POST['sale_date'] ?? date('Y-m-d')
            ]);

            echo "<h2 style='text-align:center; color:green;'>✅ 売上を登録しました。</h2>";
            echo "<p style='text-align:center;'>
                    <a href='?route=sales_form'>← 登録画面に戻る</a> |
                    <a href='?route=sales_list'>売上一覧を見る</a>
                  </p>";

        } catch (Exception $e) {
            echo "<p style='color:red; text-align:center;'>❌ 登録エラー: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    }

    // 一覧表示
    public function list() {
        try {
            $db = new PDO('sqlite:' . __DIR__ . '/../../database/chronobase.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sales = $db->query('SELECT * FROM sales ORDER BY id DESC')->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            $sales = [];
            echo "<p style='color:red; text-align:center;'>データベースエラー: " . htmlspecialchars($e->getMessage()) . "</p>";
        }

        include __DIR__ . '/../views/sales_list.php';
    }
}