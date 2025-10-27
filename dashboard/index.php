<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">
    
    <!-- Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-slate-700 to-slate-800 text-white flex flex-col">
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
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-slate-600 rounded-xl hover:bg-slate-500 transition">
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
            <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition">
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
                <h2 class="text-3xl font-bold text-gray-800">Dashboard</h2>
                <p class="text-gray-600 mt-1">
                    Selamat datang kembali, <span class="font-semibold">konvontovol</span>! 
                    <span class="text-gray-500">Monday, 27 October 2025</span>
                </p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Bulan Ini</p>
                    <p class="font-bold text-xl">October 2025</p>
                </div>
                <button class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center text-white hover:bg-blue-600 transition">
                    <i class="fas fa-chart-line"></i>
                </button>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-8 space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Total Pemasukan -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Pemasukan</p>
                            <h3 class="text-3xl font-bold">Rp 0</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-500 rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 text-green-500 text-sm">
                        <i class="fas fa-arrow-up"></i>
                        <span>+0.0% dari bulan lalu</span>
                    </div>
                </div>

                <!-- Total Pengeluaran -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Pengeluaran</p>
                            <h3 class="text-3xl font-bold">Rp 0</h3>
                        </div>
                        <div class="w-12 h-12 bg-red-500 rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-wallet"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 text-red-500 text-sm">
                        <i class="fas fa-arrow-up"></i>
                        <span>+0.0% dari bulan lalu</span>
                    </div>
                </div>

                <!-- Pendapatan Bersih -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Pendapatan Bersih</p>
                            <h3 class="text-3xl font-bold">Rp 0</h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-500 rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 text-green-500 text-sm">
                        <i class="fas fa-arrow-up"></i>
                        <span>+0.0% dari bulan lalu</span>
                    </div>
                </div>

                <!-- Total Transaksi -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <p class="text-gray-600 text-sm mb-1">Total Transaksi</p>
                            <h3 class="text-3xl font-bold">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-purple-500 rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                    </div>
                    <div class="flex items-center gap-1 text-gray-500 text-sm">
                        <i class="fas fa-chart-line"></i>
                        <span>0 bulan ini</span>
                    </div>
                </div>
            </div>

            <!-- Charts Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Tren Bulanan -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Tren Bulanan</h3>
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
                    <canvas id="trenChart"></canvas>
                </div>

                <!-- Distribusi Kategori -->
                <div class="bg-white rounded-2xl p-6 shadow-md">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-xl font-bold">Distribusi Kategori</h3>
                        <select class="px-3 py-1 border rounded-lg text-sm">
                            <option>Pengeluaran</option>
                            <option>Pemasukan</option>
                        </select>
                    </div>
                    <div class="flex items-center justify-center" style="height: 300px;">
                        <canvas id="donutChart"></canvas>
                    </div>
                    <div class="text-center mt-4">
                        <div class="flex items-center justify-center gap-2 text-gray-500">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-sm">Tidak ada data</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transaksi Terbaru -->
            <div class="bg-white rounded-2xl p-6 shadow-md">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-xl font-bold">Transaksi Terbaru</h3>
                    <a href="#" class="text-blue-500 hover:text-blue-600 font-semibold">Lihat Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b">
                                <th class="text-left py-3 px-4 text-gray-600 font-semibold">No</th>
                                <th class="text-left py-3 px-4 text-gray-600 font-semibold">Tanggal</th>
                                <th class="text-left py-3 px-4 text-gray-600 font-semibold">Deskripsi</th>
                                <th class="text-left py-3 px-4 text-gray-600 font-semibold">Jenis</th>
                                <th class="text-right py-3 px-4 text-gray-600 font-semibold">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5" class="text-center py-12">
                                    <i class="fas fa-inbox text-5xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500 font-medium">Tidak ada transaksi terbaru.</p>
                                    <p class="text-gray-400 text-sm mt-1">Silakan tambahkan transaksi baru untuk melihat daftar di sini.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
        // Tren Chart
        const trenCtx = document.getElementById('trenChart').getContext('2d');
        new Chart(trenCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Pemasukan',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    borderColor: '#22c55e',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Pengeluaran',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    tension: 0.4,
                    fill: true
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
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value;
                            }
                        }
                    }
                }
            }
        });

        // Donut Chart
        const donutCtx = document.getElementById('donutChart').getContext('2d');
        new Chart(donutCtx, {
            type: 'doughnut',
            data: {
                labels: ['Tidak ada data'],
                datasets: [{
                    data: [100],
                    backgroundColor: ['#3b82f6'],
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
                },
                cutout: '70%'
            }
        });
    </script>
</body>
</html>