<?php
require_once __DIR__ . '/../config/config.php';

class AuthController {

    public function loginForm() {
        echo '
        <html>
        <head>
            <meta charset="UTF-8">
            <title>ChronoBase 管理ログイン</title>
            <style>
                body { font-family: sans-serif; background-color: #f7f7f7; }
                .login-box {
                    max-width: 360px; margin: 80px auto; background: white;
                    padding: 40px; border-radius: 10px; box-shadow: 0 0 8px rgba(0,0,0,0.1);
                }
                h2 { text-align: center; color: #333; margin-bottom: 20px; }
                input[type=text], input[type=password] {
                    width: 100%; padding: 10px; margin: 10px 0;
                    border: 1px solid #ccc; border-radius: 5px;
                }
                button {
                    width: 100%; padding: 10px; background: #333; color: white;
                    border: none; border-radius: 5px; cursor: pointer;
                }
                button:hover { background: #555; }
                .error { color: red; text-align: center; margin-top: 10px; }
            </style>
        </head>
        <body>
            <div class="login-box">
                <h2>ChronoBase 管理ログイン</h2>
                <form method="POST" action="?route=login">
                    <input type="text" name="username" placeholder="ユーザー名" required>
                    <input type="password" name="password" placeholder="パスワード" required>
                    <button type="submit">ログイン</button>
                </form>
            </div>
        </body>
        </html>
        ';
    }

    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if ($username === ADMIN_USER && password_verify($password, ADMIN_PASS)) {
            session_start();
            $_SESSION['is_admin'] = true;
            header('Location: ?route=dashboard');
            exit;
        } else {
            echo "<p class='error'>ユーザー名またはパスワードが違います。</p>";
            $this->loginForm();
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ?route=login');
        exit;
    }
}
