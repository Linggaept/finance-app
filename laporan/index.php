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
    
    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-slate-700 to-slate-800 text-white flex flex-col">
        <!-- Logo -->
        <div class="p-6 border-b border-slate-600">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-xl"></i>
                </div>
                <div>
                    <h1 class="font-bold text-lg">Finance Manager</h1>
                    <p class="text-sm text-gray-300">Smart Money Management</p>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-6 border-b border-slate-600">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center font-bold text-xl">
                    K
                </div>
                <div class="flex-1">
                    <p class="text-sm text-gray-300">Selamat datang,</p>
                    <p class="font-semibold">konvontovol</p>
                </div>
                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
            </div>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-4 space-y-2">
            <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition">
                <i class="fas fa-chart-line text-lg"></i>
                <div>
                    <p class="font-semibold">Dashboard</p>
                    <p class="text-xs text-gray-300">Overview & Analytics</p>
                </div>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition">
                <i class="fas fa-plus-circle text-lg"></i>
                <div>
                    <p class="font-semibold">Tambah Data</p>
                    <p class="text-xs text-gray-300">Input Transaksi Baru</p>
                </div>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition">
                <i class="fas fa-list text-lg"></i>
                <div>
                    <p class="font-semibold">Daftar Data</p>
                    <p class="text-xs text-gray-300">Lihat Semua Transaksi</p>
                </div>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-slate-600 rounded-xl hover:bg-slate-500 transition">
                <i class="fas fa-file-alt text-lg"></i>
                <div>
                    <p class="font-semibold">Laporan</p>
                    <p class="text-xs text-gray-300">Analisis & Grafik</p>
                </div>
            </a>
        </nav>

        <!-- Footer -->
        <div class="p-4 border-t border-slate-600 space-y-2">
            <div class="flex items-center justify-between text-sm">
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 bg-green-400 rounded-full"></div>
                    <span>System Online</span>
                </div>
                <button class="flex items-center gap-2 hover:text-red-400 transition">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto">
        <!-- Header -->
        <header class="bg-white border-b px-8 py-6 flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Laporan Keuangan</h2>
                <p class="text-gray-600 mt-1">Analisis pemasukan, pengeluaran, dan insight keuangan Anda</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Total Transaksi</p>
                    <p class="font-bold text-xl">0 item</p>
                </div>
                <button class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white hover:bg-blue-600 transition shadow-lg">
                    <i class="fas fa-chart-line"></i>
                </button>
            </div>
        </header>

        <!-- Content -->
        <div class="p-8 space-y-6">
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
                            <h3 class="text-3xl font-bold text-green-600">Rp0</h3>
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
                            <h3 class="text-3xl font-bold text-red-600">Rp0</h3>
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
                            <h3 class="text-3xl font-bold text-blue-600">Rp0</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex flex-wrap gap-4 items-end">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm">Tahun</label>
                        <input 
                            type="number" 
                            value="2025"
                            class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-32"
                        >
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm">Bulan</label>
                        <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-40">
                            <option>Semua</option>
                            <option>Januari</option>
                            <option>Februari</option>
                            <option>Maret</option>
                            <option>April</option>
                            <option>Mei</option>
                            <option>Juni</option>
                            <option>Juli</option>
                            <option>Agustus</option>
                            <option>September</option>
                            <option>Oktober</option>
                            <option>November</option>
                            <option>Desember</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2 text-sm">Jenis</label>
                        <select class="px-4 py-2 border-2 border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 w-40">
                            <option>Semua</option>
                            <option>Pemasukan</option>
                            <option>Pengeluaran</option>
                        </select>
                    </div>
                    <button class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-2 font-semibold">
                        <i class="fas fa-filter"></i>
                        Filter
                    </button>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Bar Chart -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fas fa-chart-bar text-blue-500"></i>
                        <h3 class="text-xl font-bold">Pemasukan vs Pengeluaran per Bulan</h3>
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
                    <canvas id="barChart"></canvas>
                </div>

                <!-- Pie Chart -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex items-center gap-2 mb-6">
                        <i class="fas fa-chart-pie text-purple-500"></i>
                        <h3 class="text-xl font-bold">Komposisi Kategori</h3>
                    </div>
                    <div class="flex items-center justify-center" style="height: 300px;">
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
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center py-16">
                                    <i class="fas fa-inbox text-6xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500 font-medium text-lg">Tidak ada data transaksi</p>
                                    <p class="text-gray-400 text-sm mt-2">Silakan tambahkan transaksi untuk melihat laporan</p>
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
        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Pemasukan',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: '#4ade80',
                    borderRadius: 6
                }, {
                    label: 'Pengeluaran',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    backgroundColor: '#f87171',
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 1.0,
                        ticks: {
                            stepSize: 0.1
                        }
                    }
                }
            }
        });

        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: ['Pemasukan', 'Pengeluaran'],
                datasets: [{
                    data: [50, 50],
                    backgroundColor: ['#22c55e', '#ef4444'],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    </script>
</body>
</html>