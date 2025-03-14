<?php
session_start();
//ambil data dari sesi
$pasienId = $_SESSION["pasien_id"];
$nama = $_SESSION["nama"];
$role = $_SESSION["role"];

$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    unset($_SESSION['notification']) ;
}
/*periksa apakah sesi username dan role ada,
jika tidak arahkan ke halaman login */
if (empty($_SESSION["username"]) || empty($_SESSION["role"])) {
    $_SESSION['notification'] = [
        'type' => 'danger',
        'message' => 'Silakan Login Terlebih Dahulu!'
    ];
    header('Location: ./auth/login.php');
    exit();
}