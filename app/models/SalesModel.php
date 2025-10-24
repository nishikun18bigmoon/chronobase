<?php
/**
 * SalesModel
 * 売上データの取得・集計を行う
 */
require_once __DIR__ . '/BaseModel.php';

class SalesModel extends BaseModel {

    // 当日の売上を取得
    public function getTodaySales() {
        $db = $this->getDB();
        $today = date('Y-m-d');
        $stmt = $db->prepare("SELECT * FROM sales WHERE DATE(created_at) = :today ORDER BY id DESC");
        $stmt->execute([':today' => $today]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 当日のスタッフ別集計（売上額・本数）
    public function getTodaySummary() {
        $db = $this->getDB();
        $today = date('Y-m-d');
        $stmt = $db->prepare("
            SELECT staff, COUNT(*) AS count, SUM(price) AS total 
            FROM sales 
            WHERE DATE(created_at) = :today 
            GROUP BY staff
            ORDER BY total DESC
        ");
        $stmt->execute([':today' => $today]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
