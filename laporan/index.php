<?php require_once '../auth/check_session.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager - Laporan Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">
    
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
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">Laporan Keuangan</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Analisis pemasukan, pengeluaran, dan insight keuangan Anda</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm text-gray-500">Total Transaksi</p>
                    <p id="total-transaksi" class="font-bold text-xl">0 item</p>
                </div>
                <button class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-full flex items-center justify-center text-white hover:bg-blue-600 transition shadow-lg">
                    <i class="fas fa-chart-line"></i>
                </button>
            </div>
        </header>

        <!-- Content -->
        <div class="p-4 sm:p-6 lg:p-8 space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Pemasukan -->
                <div class="bg-white rounded-2xl p-6 shadow-md relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-green-500"></div>
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center text-white flex-shrink-0">
                            <i class="fas fa-arrow-down text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Pemasukan</p>
                            <h3 id="total-pemasukan" class="text-3xl font-bold text-green-600">Rp0</h3>
                        </div>
                    </div>
                </div>

                <!-- Pengeluaran -->
                <div class="bg-white rounded-2xl p-6 shadow-md relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-red-500"></div>
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-red-500 rounded-2xl flex items-center justify-center text-white flex-shrink-0">
                            <i class="fas fa-arrow-up text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Pengeluaran</p>
                            <h3 id="total-pengeluaran" class="text-3xl font-bold text-red-600">Rp0</h3>
                        </div>
                    </div>
                </div>

                <!-- Saldo Bersih -->
                <div class="bg-white rounded-2xl p-6 shadow-md relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-1 h-full bg-blue-500"></div>
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-blue-500 rounded-2xl flex items-center justify-center text-white flex-shrink-0">
                            <i class="fas fa-wallet text-xl"></i>
                        </div>
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Saldo Bersih</p>
                            <h3 id="saldo-bersih" class="text-3xl font-bold text-blue-600">Rp0</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex flex-wrap gap-4 items-end">
                    <div>
                        <label for="filter-tahun" class="block text-gray-700 font-semibold mb-2 text-sm">Tahun</label>
                        <input 
                            id="filter-tahun"
                            type="number" 
                            value="<?php echo date('Y'); ?>"
                            class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-32"
                        >
                    </div>
                    <div>
                        <label for="filter-bulan" class="block text-gray-700 font-semibold mb-2 text-sm">Bulan</label>
                        <select id="filter-bulan" class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-40">
                            <option value="semua">Semua</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div>
                        <label for="filter-jenis" class="block text-gray-700 font-semibold mb-2 text-sm">Jenis</label>
                        <select id="filter-jenis" class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-40">
                            <option value="semua">Semua</option>
                            <option value="pemasukan">Pemasukan</option>
                            <option value="pengeluaran">Pengeluaran</option>
                        </select>
                    </div>
                    <button id="filter-btn" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-2 font-semibold">
                        <i class="fas fa-filter"></i>
                        Filter
                    </button>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Bar Chart -->
                <div class="bg-white rounded-2xl p-6 shadow-md flex flex-col">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fas fa-chart-bar text-blue-500"></i>
                        <h3 class="text-xl font-bold">Pemasukan vs Pengeluaran</h3>
                    </div>
                    <div class="flex justify-center gap-6 mb-4 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-green-400 rounded"></div>
                            <span>Pemasukan</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-4 h-4 bg-red-400 rounded"></div>
                            <span>Pengeluaran</span>
                        </div>
                    </div>
                    <div class="relative h-80">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="bg-white rounded-2xl p-6 shadow-md flex flex-col">
                    <div class="flex items-center gap-2 mb-4">
                        <i class="fas fa-chart-pie text-purple-500"></i>
                        <h3 class="text-xl font-bold">Komposisi Kategori</h3>
                    </div>
                    <div class="relative h-80 flex items-center justify-center">
                        <canvas id="pieChart"></canvas>
                    </div>
                    <div class="flex justify-center gap-8 mt-4 text-sm">
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                            <span class="font-semibold">Pemasukan</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                            <span class="font-semibold">Pengeluaran</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Detail Transaksi Table -->
            <div class="bg-white rounded-2xl shadow-md overflow-hidden">
                <div class="p-6 border-b">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-table text-green-500"></i>
                        <h3 class="text-xl font-bold">Detail Transaksi</h3>
                    </div>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-blue-50">
                            <tr>
                                <th class="text-left py-4 px-6 text-gray-700 font-semibold">No</th>
                                <th class="text-left py-4 px-6 text-gray-700 font-semibold">Tanggal</th>
                                <th class="text-left py-4 px-6 text-gray-700 font-semibold">Deskripsi</th>
                                <th class="text-right py-4 px-6 text-gray-700 font-semibold">Jumlah</th>
                                <th class="text-center py-4 px-6 text-gray-700 font-semibold">Jenis</th>
                            </tr>
                        </thead>
                        <tbody id="transaksi-tbody">
                            <tr>
                                <td colspan="5" class="text-center py-16">
                                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500 font-medium text-lg">Tidak ada data transaksi</p>
                                    <p class="text-gray-400 text-sm mt-2">Silakan ubah filter untuk melihat laporan</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tips Keuangan -->
            <div class="bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-6 border border-yellow-200">
                <div class="flex items-start gap-3 mb-4">
                    <i class="fas fa-lightbulb text-yellow-600 text-2xl mt-1"></i>
                    <h3 class="font-bold text-gray-800 text-xl">Tips Keuangan</h3>
                </div>
                <ul class="space-y-3 text-gray-700">
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Selalu catat transaksi secara rutin untuk memantau arus kas.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Analisis pengeluaran terbesar Anda dan cari peluang penghematan.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Gunakan fitur filter dan grafik untuk memahami pola keuangan Anda.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Jaga keseimbangan antara pemasukan dan pengeluaran setiap bulan.</span>
                    </li>
                </ul>
            </div>
        </div>
    </main>

    <script>
        // --- UTILITIES ---
        const formatRupiah = (number) => {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(number);
        };

        const formatDate = (dateString) => {
            const options = { day: '2-digit', month: 'long', year: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        };

        // --- DOM ELEMENTS ---
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
        
        const totalTransaksiEl = document.getElementById('total-transaksi');
        const totalPemasukanEl = document.getElementById('total-pemasukan');
        const totalPengeluaranEl = document.getElementById('total-pengeluaran');
        const saldoBersihEl = document.getElementById('saldo-bersih');
        
        const filterTahunEl = document.getElementById('filter-tahun');
        const filterBulanEl = document.getElementById('filter-bulan');
        const filterJenisEl = document.getElementById('filter-jenis');
        const filterBtn = document.getElementById('filter-btn');
        
        const transaksiTbody = document.getElementById('transaksi-tbody');

        // --- CHARTS ---
        let barChart, pieChart;

        const initCharts = () => {
            const barCtx = document.getElementById('barChart').getContext('2d');
            barChart = new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Pemasukan',
                        data: [],
                        backgroundColor: '#4ade80',
                        borderRadius: 6
                    }, {
                        label: 'Pengeluaran',
                        data: [],
                        backgroundColor: '#f87171',
                        borderRadius: 6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: (value) => formatRupiah(value).replace(',00', '')
                            }
                        }
                    }
                }
            });

            const pieCtx = document.getElementById('pieChart').getContext('2d');
            pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: {
                    labels: ['Pemasukan', 'Pengeluaran'],
                    datasets: [{
                        data: [0, 0],
                        backgroundColor: ['#22c55e', '#ef4444'],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } }
                }
            });
        };

        // --- DATA FETCHING & UI UPDATE ---
        const updateUI = (data) => {
            // 1. Update Summary Cards
            totalTransaksiEl.textContent = `${data.summary.total_transaksi} item`;
            totalPemasukanEl.textContent = formatRupiah(data.summary.total_pemasukan);
            totalPengeluaranEl.textContent = formatRupiah(data.summary.total_pengeluaran);
            
            const saldoBersih = data.summary.saldo_bersih;
            saldoBersihEl.textContent = formatRupiah(saldoBersih);
            saldoBersihEl.classList.toggle('text-red-600', saldoBersih < 0);
            saldoBersihEl.classList.toggle('text-blue-600', saldoBersih >= 0);

            // 2. Update Bar Chart
            barChart.data.datasets[0].data = data.bar_chart.pemasukan;
            barChart.data.datasets[1].data = data.bar_chart.pengeluaran;
            barChart.update();

            // 3. Update Pie Chart
            const pieData = [data.pie_chart.pemasukan, data.pie_chart.pengeluaran];
            pieChart.data.datasets[0].data = pieData;
            // If no data, show a grey placeholder
            if (pieData.every(item => item === 0)) {
                pieChart.data.datasets[0].backgroundColor = ['#e5e7eb', '#d1d5db'];
            } else {
                pieChart.data.datasets[0].backgroundColor = ['#22c55e', '#ef4444'];
            }
            pieChart.update();

            // 4. Update Transactions Table
            transaksiTbody.innerHTML = '';
            if (data.transactions.length === 0) {
                transaksiTbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-16">
                            <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 font-medium text-lg">Tidak ada data untuk filter ini</p>
                            <p class="text-gray-400 text-sm mt-2">Coba ubah periode atau jenis transaksi.</p>
                        </td>
                    </tr>
                `;
            } else {
                data.transactions.forEach((t, index) => {
                    const isPemasukan = t.jenis === 'pemasukan';
                    const row = `
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-4 px-6 text-gray-600">${index + 1}</td>
                            <td class="py-4 px-6 text-gray-800 font-medium">${formatDate(t.tanggal)}</td>
                            <td class="py-4 px-6 text-gray-800">${t.deskripsi}</td>
                            <td class="py-4 px-6 text-right font-semibold ${isPemasukan ? 'text-green-600' : 'text-red-600'}">
                                ${isPemasukan ? '+' : '-'} ${formatRupiah(t.jumlah)}
                            </td>
                            <td class="py-4 px-6 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold ${isPemasukan ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                    ${t.jenis}
                                </span>
                            </td>
                        </tr>
                    `;
                    transaksiTbody.insertAdjacentHTML('beforeend', row);
                });
            }
        };

        const fetchData = async () => {
            const year = filterTahunEl.value;
            const month = filterBulanEl.value;
            const type = filterJenisEl.value;
            
            // Add loading indicator
            filterBtn.disabled = true;
            filterBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memuat...';

            try {
                const response = await fetch(`get_report_data.php?year=${year}&month=${month}&type=${type}`);
                if (!response.ok) {
                    throw new Error('Gagal mengambil data dari server.');
                }
                const data = await response.json();
                updateUI(data);
            } catch (error) {
                console.error('Error fetching data:', error);
                transaksiTbody.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-16">
                            <i class="fas fa-exclamation-triangle text-6xl text-red-400 mb-4"></i>
                            <p class="text-gray-600 font-medium text-lg">Oops! Terjadi Kesalahan</p>
                            <p class="text-gray-500 text-sm mt-2">Tidak dapat memuat data laporan. Coba lagi nanti.</p>
                        </td>
                    </tr>
                `;
            } finally {
                // Remove loading indicator
                filterBtn.disabled = false;
                filterBtn.innerHTML = '<i class="fas fa-filter"></i> Filter';
            }
        };

        // --- EVENT LISTENERS ---
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

        filterBtn.addEventListener('click', fetchData);

        // Initial Load
        document.addEventListener('DOMContentLoaded', () => {
            // Set bulan filter to current month
            const currentMonth = new Date().getMonth() + 1;
            filterBulanEl.value = currentMonth;
            
            initCharts();
            fetchData();
        });
    </script>
</body>
</html>
