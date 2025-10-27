<?php
require_once '../auth/check_session.php';
require_once '../config/database.php';

header('Content-Type: application/json');

$user_id = $_SESSION['user_id'];

// Jika ada ID, kembalikan satu transaksi (untuk modal edit)
if (isset($_GET['id'])) {
    $transaction_id = $_GET['id'];

    try {
        $stmt = $db->prepare("SELECT * FROM transactions WHERE id = ? AND user_id = ?");
        $stmt->execute([$transaction_id, $user_id]);
        $transaction = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($transaction) {
            echo json_encode($transaction);
        } else {
            http_response_code(404);
            echo json_encode(['message' => 'Transaksi tidak ditemukan atau bukan milik Anda.']);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => $e->getMessage()]);
    }
    exit; // Hentikan eksekusi setelah mengirim satu data
}

// --- Logika untuk mengambil daftar transaksi dengan filter ---

// Filters
$year = isset($_GET['year']) && $_GET['year'] !== 'semua' ? $_GET['year'] : null;
$month = isset($_GET['month']) && $_GET['month'] !== 'semua' ? $_GET['month'] : null;
$type = isset($_GET['type']) && $_GET['type'] !== 'semua' ? $_GET['type'] : null;

try {
    // Base query
    $query = "SELECT * FROM transactions WHERE user_id = :user_id";
    $params = ['user_id' => $user_id];

    if ($year) {
        $query .= " AND YEAR(tanggal) = :year";
        $params['year'] = $year;
    }
    if ($month) {
        $query .= " AND MONTH(tanggal) = :month";
        $params['month'] = $month;
    }
    if ($type) {
        $query .= " AND jenis = :type";
        $params['type'] = $type;
    }

    $query .= " ORDER BY tanggal DESC";

    $stmt = $db->prepare($query);
    $stmt->execute($params);
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($transactions);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => $e->getMessage()]);
}
?>
