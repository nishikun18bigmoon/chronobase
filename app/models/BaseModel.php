<?php
class BaseModel {
    protected $pdo;

    public function __construct() {
        $dbPath = __DIR__ . '/../../database/chronobase.db';
        $this->pdo = new PDO('sqlite:' . $dbPath);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
