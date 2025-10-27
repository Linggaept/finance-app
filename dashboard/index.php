<?php 
require_once '../auth/check_session.php'; 
require_once '../config/database.php';

$user_id = $_SESSION['user_id'];

// Fetch all transactions for the user for summary stats
$stmt = $db->prepare("SELECT * FROM transactions WHERE user_id = ?");
$stmt->execute([$user_id]);
$transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch recent transactions (last 5)
$stmt_recent = $db->prepare("SELECT * FROM transactions WHERE user_id = ? ORDER BY tanggal DESC, id DESC LIMIT 5");
$stmt_recent->execute([$user_id]);
$recent_transactions = $stmt_recent->fetchAll(PDO::FETCH_ASSOC);


// Calculate stats
$total_transaksi = count($transactions);
$total_pemasukan = 0;
$total_pengeluaran = 0;

foreach ($transactions as $t) {
    if ($t['jenis'] == 'pemasukan') {
        $total_pemasukan += $t['jumlah'];
    } else {
        $total_pengeluaran += $t['jumlah'];
    }
}
$saldo_netto = $total_pemasukan - $total_pengeluaran;

// Data untuk chart tren bulanan (tahun ini)
$current_year = date('Y');
$pemasukan_bulanan = array_fill(0, 12, 0);
$pengeluaran_bulanan = array_fill(0, 12, 0);

$stmt_chart = $db->prepare(
    "SELECT MONTH(tanggal) as bulan, jenis, SUM(jumlah) as total 
     FROM transactions 
     WHERE user_id = ? AND YEAR(tanggal) = ?
     GROUP BY bulan, jenis"
);
$stmt_chart->execute([$user_id, $current_year]);
$chart_data = $stmt_chart->fetchAll(PDO::FETCH_ASSOC);

foreach ($chart_data as $data) {
    $bulan_index = $data['bulan'] - 1;
    if ($data['jenis'] == 'pemasukan') {
        $pemasukan_bulanan[$bulan_index] = (float)$data['total'];
    } else {
        $pengeluaran_bulanan[$bulan_index] = (float)$data['total'];
    }
}

?>
    <?php include '../partials/header.php'; ?>
    
    <?php include '../partials/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto">
        <!-- Header -->
        <header class="bg-white border-b px-4 sm:px-6 lg:px-8 py-4 sm:py-6 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <!-- Mobile Menu Button -->
                <button id="openSidebar" class="lg:hidden w-10 h-10 flex items-center justify-center text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div>
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">Dashboard</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">
                        Selamat datang kembali, <span class="font-semibold"><?php echo htmlspecialchars($_SESSION['username']); ?></span>! 
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm text-gray-500">Tahun Ini</p>
                    <p class="font-bold text-xl"><?php echo date('Y'); ?></p>
                </div>
                <a href="../laporan/" class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-full flex items-center justify-center text-white hover:bg-blue-600 transition">
                    <i class="fas fa-chart-line"></i>
                </a>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-4 sm:p-6 lg:p-8 space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Pemasukan -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Pemasukan</p>
                            <h3 class="text-3xl font-bold text-green-600">Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Pengeluaran -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Pengeluaran</p>
                            <h3 class="text-3xl font-bold text-red-600">Rp <?php echo number_format($total_pengeluaran, 0, ',', '.'); ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-red-100 text-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Saldo Netto -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Saldo Netto</p>
                            <h3 class="text-3xl font-bold <?php echo ($saldo_netto >= 0) ? 'text-blue-600' : 'text-red-600'; ?>">Rp <?php echo number_format($saldo_netto, 0, ',', '.'); ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                </div>

                <!-- Total Transaksi -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Transaksi</p>
                            <h3 class="text-3xl font-bold text-purple-600"><?php echo $total_transaksi; ?></h3>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">
                <!-- Tren Bulanan -->
                <div class="bg-white rounded-2xl p-6 shadow-md flex flex-col">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Tren Bulanan (<?php echo $current_year; ?>)</h3>
                        <div class="flex items-center gap-4 text-sm">
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                <span>Pemasukan</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                <span>Pengeluaran</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative h-80">
                        <canvas id="trenChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Transaksi Terbaru -->
            <div class="bg-white rounded-2xl shadow-md">
                <div class="p-6 flex justify-between items-center border-b">
                    <h3 class="text-xl font-bold">Transaksi Terbaru</h3>
                    <a href="../transaksi/" class="text-blue-500 hover:text-blue-600 font-semibold text-sm">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr class="border-b">
                                <th class="text-left py-3 px-6 text-gray-600 font-semibold text-sm">Tanggal</th>
                                <th class="text-left py-3 px-6 text-gray-600 font-semibold text-sm">Deskripsi</th>
                                <th class="text-center py-3 px-6 text-gray-600 font-semibold text-sm">Jenis</th>
                                <th class="text-right py-3 px-6 text-gray-600 font-semibold text-sm">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recent_transactions)): ?>
                                <tr>
                                    <td colspan="4" class="text-center py-16">
                                        <i class="fas fa-inbox text-5xl text-gray-300 mb-4"></i>
                                        <p class="text-gray-500 font-medium">Tidak ada transaksi terbaru.</p>
                                        <p class="text-gray-400 text-sm mt-1">Silakan tambahkan transaksi baru untuk melihat daftar di sini.</p>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($recent_transactions as $t): ?>
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-4 px-6"><?php echo date('d M Y', strtotime($t['tanggal'])); ?></td>
                                    <td class="py-4 px-6"><?php echo htmlspecialchars($t['deskripsi']); ?></td>
                                    <td class="py-4 px-6 text-center">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full <?php echo ($t['jenis'] == 'pemasukan') ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                            <?php echo ucfirst($t['jenis']); ?>
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-right font-medium <?php echo ($t['jenis'] == 'pemasukan') ? 'text-green-600' : 'text-red-600'; ?>">
                                        <?php echo ($t['jenis'] == 'pemasukan') ? '+' : '-'; ?> Rp <?php echo number_format($t['jumlah'], 0, ',', '.'); ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Mobile menu functionality
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            mobileMenuOverlay.classList.remove('hidden');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            mobileMenuOverlay.classList.add('hidden');
        });

        mobileMenuOverlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            mobileMenuOverlay.classList.add('hidden');
        });

        const formatRupiah = (number) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(number);
        };

        // Tren Chart
        const trenCtx = document.getElementById('trenChart').getContext('2d');
        new Chart(trenCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Pemasukan',
                    data: <?php echo json_encode(array_values($pemasukan_bulanan)); ?>,
                    borderColor: '#22c55e',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Pengeluaran',
                    data: <?php echo json_encode(array_values($pengeluaran_bulanan)); ?>,
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${formatRupiah(context.raw)}`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                if (value >= 1000000) {
                                    return 'Rp ' + (value / 1000000) + ' Jt';
                                }
                                if (value >= 1000) {
                                    return 'Rp ' + (value / 1000) + ' Rb';
                                }
                                return 'Rp ' + value;
                            }
                        }
                    }
                }
            }
        });

    </script>
</body>
</html>
