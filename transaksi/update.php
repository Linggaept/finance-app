<?php
require_once '../auth/check_session.php';
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transaction_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];

    if (empty($transaction_id) || empty($jenis) || empty($jumlah) || empty($deskripsi) || empty($tanggal)) {
        http_response_code(400);
        echo json_encode(['message' => 'Semua field harus diisi.']);
        exit();
    }

    try {
        // Verify ownership
        $stmt = $db->prepare("SELECT * FROM transactions WHERE id = ? AND user_id = ?");
        $stmt->execute([$transaction_id, $user_id]);
        $transaction = $stmt->fetch();

        if ($transaction) {
            $update_stmt = $db->prepare("UPDATE transactions SET jenis = ?, jumlah = ?, deskripsi = ?, tanggal = ? WHERE id = ?");
            $update_stmt->execute([$jenis, $jumlah, $deskripsi, $tanggal, $transaction_id]);
            
            echo json_encode(['message' => 'Transaksi berhasil diperbarui.']);
        } else {
            http_response_code(403);
            echo json_encode(['message' => 'Akses ditolak.']);
        }

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Metode tidak diizinkan.']);
}
?>