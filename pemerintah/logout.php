<?php
session_start(); // Memulai sesi

// Menghapus semua variabel sesi
$_SESSION = array();

// Menghancurkan sesi
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy(); // Menghancurkan sesi

// Mengarahkan ke halaman login
header("Location: login.php");
exit;
?>