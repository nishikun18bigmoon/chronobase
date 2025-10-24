<?php
/**
 * セッションクラス（BIG MOON 旧 buy-site より移植）
 */
class Session {
  function __construct() {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }

    if (!isset($_SESSION['init'])) {
      session_destroy();
      session_start();
      session_regenerate_id(true);
      $_SESSION['init'] = true;
    }
  }

  function get($key) {
    return $_SESSION[$key] ?? null;
  }

  function set($key, $data) {
    $_SESSION[$key] = $data;
  }

  function delete($key) {
    unset($_SESSION[$key]);
  }

  function clear() {
    $_SESSION = [];
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 42000, '/');
    }
    session_destroy();
  }
}
?>
