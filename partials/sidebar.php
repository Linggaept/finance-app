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
                <?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?>
            </div>
            <div class="flex-1">
                <p class="text-sm text-gray-300">Selamat datang,</p>
                <p class="font-semibold"><?php echo htmlspecialchars($_SESSION['username']); ?></p>
            </div>
            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
        </div>
    </div>

    <!-- Menu -->
    <?php $current_page = $_SERVER['REQUEST_URI']; ?>
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <a href="../dashboard" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition <?php echo strpos($current_page, 'dashboard') !== false ? 'bg-slate-600' : ''; ?>">
            <i class="fas fa-chart-line text-lg"></i>
            <div>
                <p class="font-semibold">Dashboard</p>
                <p class="text-xs text-gray-300">Overview & Analytics</p>
            </div>
        </a>
        <a href="../kelola-data/" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition <?php echo strpos($current_page, 'kelola-data') !== false ? 'bg-slate-600' : ''; ?>">
            <i class="fas fa-plus-circle text-lg"></i>
            <div>
                <p class="font-semibold">Tambah Data</p>
                <p class="text-xs text-gray-300">Input Transaksi Baru</p>
            </div>
        </a>
        <a href="../transaksi/" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition <?php echo strpos($current_page, 'transaksi') !== false ? 'bg-slate-600' : ''; ?>">
            <i class="fas fa-list text-lg"></i>
            <div>
                <p class="font-semibold">Daftar Data</p>
                <p class="text-xs text-gray-300">Lihat Semua Transaksi</p>
            </div>
        </a>
        <a href="../laporan/" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition <?php echo strpos($current_page, 'laporan') !== false ? 'bg-slate-600' : ''; ?>">
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
            <a href="../auth/logout.php" class="flex items-center gap-2 hover:text-red-400 transition">
                <i class="fas fa-sign-out-alt"></i>
                <span class="hidden sm:inline">Logout</span>
            </a>
        </div>
    </div>
</aside>