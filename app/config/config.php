<?php
// ===== ChronoBase ログイン設定（10名＋開発者）=====

// 各ユーザーの情報（将来的にDB化可能）
$USERS = [
    'tencho' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'manager',
        'name' => '店長'
    ],
    'morita' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'staff',
        'name' => '森田'
    ],
    'nishimura' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'developer',
        'name' => '西村（開発）'
    ],
    'watanabe' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'staff',
        'name' => '渡邉'
    ],
    'terakawa' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'staff',
        'name' => '寺川'
    ],
    'hirai' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'staff',
        'name' => '平井'
    ],
    'kamiya' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'staff',
        'name' => '神谷'
    ],
    'shinnou' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'executive',
        'name' => '神農社長'
    ],
    'tokai' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'partner',
        'name' => 'トーカイ'
    ],
    'staff' => [
        'password' => password_hash('5080', PASSWORD_DEFAULT),
        'role' => 'parttimer',
        'name' => '社内スタッフ（アルバイト）'
    ]
];

// ===== セッション開始（安全版）=====
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>