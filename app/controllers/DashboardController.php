<?php
require_once __DIR__ . '/../models/SalesModel.php';

class DashboardController {

    // ダッシュボードトップ
    public function index() {
        $salesModel = new SalesModel();

        // 当日売上一覧を取得
        $todaySales = $salesModel->getTodaySales();

        // 当日集計（スタッフ別）
        $summary = $salesModel->getTodaySummary();

        include __DIR__ . '/../views/dashboard.php';
    }

    // 詳細集計画面（グラフ用）
    public function summary() {
        $salesModel = new SalesModel();
        $summary = $salesModel->getTodaySummary();
        include __DIR__ . '/../views/dashboard_summary.php';
    }
}
?>
