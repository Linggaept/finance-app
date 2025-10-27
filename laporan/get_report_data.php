<?php
require_once '../auth/check_session.php';
require_once '../config/database.php';

header('Content-Type: application/json');

$user_id = $_SESSION['user_id'];

// Filters
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : 'semua';
$type = isset($_GET['type']) ? $_GET['type'] : 'semua';

$response = [
    'filters' => [
        'year' => $year,
        'month' => $month,
        'type' => $type,
    ],
    'summary' => [
        'total_pemasukan' => 0,
        'total_pengeluaran' => 0,
        'saldo_bersih' => 0,
        'total_transaksi' => 0,
    ],
    'transactions' => [],
    'bar_chart' => [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        'pemasukan' => array_fill(0, 12, 0),
        'pengeluaran' => array_fill(0, 12, 0),
    ],
    'pie_chart' => [
        'pemasukan' => 0,
        'pengeluaran' => 0,
    ]
];

try {
    // Base query for transactions
    $transactions_query = "SELECT * FROM transactions WHERE user_id = :user_id";
    $params = ['user_id' => $user_id];

    if ($year) {
        $transactions_query .= " AND YEAR(tanggal) = :year";
        $params['year'] = $year;
    }
    if ($month !== 'semua') {
        $transactions_query .= " AND MONTH(tanggal) = :month";
        $params['month'] = $month;
    }
    if ($type !== 'semua') {
        $transactions_query .= " AND jenis = :type";
        $params['type'] = $type;
    }

    $transactions_query .= " ORDER BY tanggal DESC";

    $stmt = $db->prepare($transactions_query);
    $stmt->execute($params);
    $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response['transactions'] = $transactions;
    $response['summary']['total_transaksi'] = count($transactions);

    // Calculate summary for the filtered period
    $total_pemasukan = 0;
    $total_pengeluaran = 0;
    foreach ($transactions as $t) {
        if ($t['jenis'] == 'pemasukan') {
            $total_pemasukan += $t['jumlah'];
        } else {
            $total_pengeluaran += $t['jumlah'];
        }
    }
    $response['summary']['total_pemasukan'] = $total_pemasukan;
    $response['summary']['total_pengeluaran'] = $total_pengeluaran;
    $response['summary']['saldo_bersih'] = $total_pemasukan - $total_pengeluaran;
    
    // Data for Pie Chart (based on filtered data)
    $response['pie_chart']['pemasukan'] = $total_pemasukan;
    $response['pie_chart']['pengeluaran'] = $total_pengeluaran;


    // Data for Bar Chart (monthly data for the selected year)
    $bar_chart_query = "SELECT MONTH(tanggal) as bulan, jenis, SUM(jumlah) as total FROM transactions WHERE user_id = :user_id AND YEAR(tanggal) = :year GROUP BY bulan, jenis";
    $stmt = $db->prepare($bar_chart_query);
    $stmt->execute(['user_id' => $user_id, 'year' => $year]);
    $monthly_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($monthly_data as $data) {
        $bulan_index = $data['bulan'] - 1;
        if ($data['jenis'] == 'pemasukan') {
            $response['bar_chart']['pemasukan'][$bulan_index] = (float)$data['total'];
        } else {
            $response['bar_chart']['pengeluaran'][$bulan_index] = (float)$data['total'];
        }
    }

    echo json_encode($response);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['message' => $e->getMessage()]);
}
?>