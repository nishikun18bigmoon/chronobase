<?php
require_once __DIR__ . '/BaseModel.php';  // ← 正しい相対パス

class SalesModel extends BaseModel {

    // 売上データを全件取得
    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM sales ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 新しい売上を登録
    public function insert($data) {
        $stmt = $this->pdo->prepare("
            INSERT INTO sales 
            (product_id, brand, model, price, staff, destination, method, created_at)
            VALUES 
            (:product_id, :brand, :model, :price, :staff, :destination, :method, datetime('now', 'localtime'))
        ");
        $stmt->execute([
            ':product_id' => $data['product_id'] ?? '',
            ':brand' => $data['brand'] ?? '',
            ':model' => $data['model'] ?? '',
            ':price' => $data['price'] ?? 0,
            ':staff' => $data['staff'] ?? '',
            ':destination' => $data['destination'] ?? '',
            ':method' => $data['method'] ?? ''
        ]);
    }

    // 月別売上集計を取得
    public function getMonthlySalesSummary() {
        $stmt = $this->pdo->query("
            SELECT 
                strftime('%Y-%m', created_at) AS month,
                SUM(price) AS total_sales
            FROM sales
            GROUP BY strftime('%Y-%m', created_at)
            ORDER BY month ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
