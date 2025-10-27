<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager - Daftar Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 flex h-screen overflow-hidden">
    
    <!-- Mobile Menu Overlay -->
    <div id="mobileMenuOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden"></div>
    
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-slate-700 to-slate-800 text-white flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300">
        <!-- Close Button (Mobile) -->
        <button id="closeSidebar" class="lg:hidden absolute top-4 right-4 text-white hover:text-gray-300">
            <i class="fas fa-times text-xl"></i>
        </button>
        
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
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
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
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-slate-600 rounded-xl hover:bg-slate-500 transition">
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
                    <span class="hidden sm:inline">Logout</span>
                </button>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto w-full">
        <!-- Header -->
        <header class="bg-white border-b px-4 sm:px-6 lg:px-8 py-4 sm:py-6">
            <div class="flex justify-between items-center gap-4">
                <!-- Mobile Menu Button -->
                <button id="openSidebar" class="lg:hidden w-10 h-10 flex items-center justify-center text-gray-700 hover:bg-gray-100 rounded-lg">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                
                <div class="flex-1">
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">Daftar Transaksi</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base hidden sm:block">Kelola dan pantau semua transaksi keuangan Anda</p>
                </div>
                
                <div class="flex items-center gap-2 sm:gap-4">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs sm:text-sm text-gray-500">Total Transaksi</p>
                        <p class="font-bold text-lg sm:text-xl">0 item</p>
                    </div>
                    <button class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-full flex items-center justify-center text-white hover:bg-purple-600 transition shadow-lg">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="p-4 sm:p-6 lg:p-8 space-y-4 sm:space-y-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
                <!-- Total Transaksi -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-md">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-3">
                        <div class="flex-1">
                            <p class="text-gray-600 text-xs sm:text-sm mb-1">Total Transaksi</p>
                            <h3 class="text-2xl sm:text-3xl font-bold">0</h3>
                            <p class="text-gray-500 text-xs sm:text-sm mt-1">Semua data</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-blue-500 rounded-lg sm:rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-clipboard-list text-sm sm:text-base"></i>
                        </div>
                    </div>
                </div>

                <!-- Pemasukan -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-md">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-3">
                        <div class="flex-1">
                            <p class="text-gray-600 text-xs sm:text-sm mb-1">Pemasukan</p>
                            <h3 class="text-2xl sm:text-3xl font-bold text-green-600">0</h3>
                            <p class="text-green-500 text-xs sm:text-sm mt-1">Transaksi</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-lg sm:rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-arrow-up text-sm sm:text-base"></i>
                        </div>
                    </div>
                </div>

                <!-- Pengeluaran -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-md">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-3">
                        <div class="flex-1">
                            <p class="text-gray-600 text-xs sm:text-sm mb-1">Pengeluaran</p>
                            <h3 class="text-2xl sm:text-3xl font-bold text-red-600">0</h3>
                            <p class="text-red-500 text-xs sm:text-sm mt-1">Transaksi</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-red-500 rounded-lg sm:rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-arrow-down text-sm sm:text-base"></i>
                        </div>
                    </div>
                </div>

                <!-- Saldo Netto -->
                <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-md col-span-2 lg:col-span-1">
                    <div class="flex flex-col sm:flex-row justify-between items-start gap-3">
                        <div class="flex-1">
                            <p class="text-gray-600 text-xs sm:text-sm mb-1">Saldo Netto (Bulan Ini)</p>
                            <h3 class="text-2xl sm:text-3xl font-bold text-green-600">Rp 0</h3>
                            <p class="text-green-500 text-xs sm:text-sm mt-1">Positif</p>
                        </div>
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-lg sm:rounded-xl flex items-center justify-center text-white">
                            <i class="fas fa-wallet text-sm sm:text-base"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter & Search -->
            <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-md">
                <div class="mb-4 sm:mb-6">
                    <h3 class="text-lg sm:text-xl font-bold mb-1">Filter & Pencarian</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Saring transaksi berdasarkan kriteria tertentu</p>
                </div>
                
                <div class="space-y-4">
                    <!-- Filter Buttons -->
                    <div class="flex flex-wrap gap-2">
                        <button id="filterSemua" class="px-3 sm:px-4 py-2 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-2">
                            <i class="fas fa-list"></i>
                            <span>Semua</span>
                        </button>
                        <button id="filterPemasukan" class="px-3 sm:px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2">
                            <i class="fas fa-arrow-up"></i>
                            <span>Pemasukan</span>
                        </button>
                        <button id="filterPengeluaran" class="px-3 sm:px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2">
                            <i class="fas fa-arrow-down"></i>
                            <span>Pengeluaran</span>
                        </button>
                    </div>

                    <!-- Dropdowns -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <select class="px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Semua Bulan</option>
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

                        <select class="px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option>Semua Tahun</option>
                            <option>2025</option>
                            <option>2024</option>
                            <option>2023</option>
                        </select>

                        <!-- Action Buttons -->
                        <button class="px-4 sm:px-6 py-2 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center justify-center gap-2">
                            <i class="fas fa-filter"></i>
                            <span>Filter</span>
                        </button>
                        <button class="px-4 sm:px-6 py-2 text-sm bg-green-500 text-white rounded-lg hover:bg-green-600 transition flex items-center justify-center gap-2">
                            <i class="fas fa-print"></i>
                            <span>Cetak</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Daftar Transaksi Table -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-md overflow-hidden">
                <div class="p-4 sm:p-6 border-b">
                    <h3 class="text-lg sm:text-xl font-bold">Daftar Transaksi</h3>
                    <p class="text-gray-600 text-xs sm:text-sm mt-1">Menampilkan 0 transaksi</p>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px]">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">No</th>
                                <th class="text-left py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Tanggal</th>
                                <th class="text-left py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Deskripsi</th>
                                <th class="text-left py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Jenis</th>
                                <th class="text-right py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Jumlah</th>
                                <th class="text-center py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="6" class="text-center py-12 sm:py-16">
                                    <i class="fas fa-inbox text-4xl sm:text-6xl text-gray-300 mb-4"></i>
                                    <p class="text-gray-500 font-medium text-base sm:text-lg">Tidak ada data Pendapatan & Pengeluaran</p>
                                    <p class="text-gray-400 text-xs sm:text-sm mt-2">Menampilkan halaman 1 dari 0</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Total Per Bulan -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-md overflow-hidden">
                <div class="p-4 sm:p-6 border-b">
                    <h3 class="text-lg sm:text-xl font-bold">Total Per Bulan</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px]">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Pada Bulan</th>
                                <th class="text-right py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Pendapatan</th>
                                <th class="text-right py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Pengeluaran</th>
                                <th class="text-right py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Total Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center py-8 sm:py-12 text-gray-400 text-sm">
                                    Tidak ada data untuk ditampilkan
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Total Per Tahun -->
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-md overflow-hidden">
                <div class="p-4 sm:p-6 border-b">
                    <h3 class="text-lg sm:text-xl font-bold">Total Per Tahun</h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[640px]">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="text-left py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Tahun</th>
                                <th class="text-right py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Pendapatan</th>
                                <th class="text-right py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Pengeluaran</th>
                                <th class="text-right py-3 sm:py-4 px-3 sm:px-6 text-gray-700 font-semibold text-sm">Total Sisa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center py-8 sm:py-12 text-gray-400 text-sm">
                                    Tidak ada data untuk ditampilkan
                                </td>
                            </tr>
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

        // Filter functionality
        const filterSemua = document.getElementById('filterSemua');
        const filterPemasukan = document.getElementById('filterPemasukan');
        const filterPengeluaran = document.getElementById('filterPengeluaran');

        function resetFilters() {
            filterSemua.className = 'px-3 sm:px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2';
            filterPemasukan.className = 'px-3 sm:px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2';
            filterPengeluaran.className = 'px-3 sm:px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2';
        }

        filterSemua.addEventListener('click', function() {
            resetFilters();
            this.className = 'px-3 sm:px-4 py-2 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-2';
            console.log('Filter: Semua');
        });

        filterPemasukan.addEventListener('click', function() {
            resetFilters();
            this.className = 'px-3 sm:px-4 py-2 text-sm bg-green-500 text-white rounded-lg hover:bg-green-600 transition flex items-center gap-2';
            console.log('Filter: Pemasukan');
        });

        filterPengeluaran.addEventListener('click', function() {
            resetFilters();
            this.className = 'px-3 sm:px-4 py-2 text-sm bg-red-500 text-white rounded-lg hover:bg-red-600 transition flex items-center gap-2';
            console.log('Filter: Pengeluaran');
        });
    </script>
</body>
</html>