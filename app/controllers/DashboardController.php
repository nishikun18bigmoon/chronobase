<?php
require_once __DIR__ . '/../models/SalesModel.php';

class DashboardController {

    public function index() {
        try {
            // モデルを呼び出し
            $salesModel = new SalesModel();

            // 月別売上集計データを取得
            $salesData = $salesModel->getMonthlySalesSummary();

        } catch (Exception $e) {
            // 例外が発生した場合に空データを渡す
            $salesData = [];
        }

        // ビューを表示
        include __DIR__ . '/../views/dashboard.php';
    }
}
