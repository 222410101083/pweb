<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

// Proses simpan aduan
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $aduan = $_POST['aduan'];
    // Simpan aduan ke database
    // Kode untuk menyimpan aduan...
    header('Location: index.php'); // Redirect setelah submit
}
?>