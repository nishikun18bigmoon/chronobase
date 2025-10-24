<?php
/**
 * ChronoBase - Database Initialization Script
 * 売上・買取テーブルを自動生成します。
 */

require_once __DIR__ . '/../app/config/config.php';

try {
    $pdo = getDBConnection();

    // 売上テーブル
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS sales (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            product_id TEXT,
            brand TEXT,
            model TEXT,
            price INTEGER,
            staff TEXT,
            method TEXT,
            created_at TEXT DEFAULT (datetime('now', 'localtime'))
        );
    ");

    // 買取テーブル
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS purchases (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            brand TEXT,
            model TEXT,
            price INTEGER,
            staff TEXT,
            method TEXT,
            created_at TEXT DEFAULT (datetime('now', 'localtime'))
        );
    ");

    echo "✅ Tables created successfully.\n";
} catch (PDOException $e) {
    echo "❌ Error creating tables: " . $e->getMessage() . "\n";
}
