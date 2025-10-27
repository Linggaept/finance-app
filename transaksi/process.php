<?php
require_once '../auth/check_session.php';
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    if (empty($jenis) || empty($jumlah) || empty($deskripsi) || empty($tanggal)) {
        header('Location: ../kelola-data/index.php?error=emptyfields');
        exit();
    }

    if (!is_numeric($jumlah) || $jumlah <= 0) {
        header('Location: ../kelola-data/index.php?error=invalidamount');
        exit();
    }

    if ($jenis !== 'pemasukan' && $jenis !== 'pengeluaran') {
        header('Location: ../kelola-data/index.php?error=invalidtype');
        exit();
    }

    try {
        $stmt = $db->prepare("INSERT INTO transactions (user_id, jenis, jumlah, deskripsi, tanggal) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $jenis, $jumlah, $deskripsi, $tanggal]);
        
        header('Location: ../transaksi/index.php?status=added');
        exit();

    } catch (PDOException $e) {
        die("Gagal menambahkan transaksi: " . $e->getMessage());
    }
}
?>