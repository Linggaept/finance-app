<?php 
    require_once '../auth/check_session.php'; 
    if(isset($_GET['error'])) {
        if ($_GET['error'] == 'emptyfields') {
            echo '<script>alert("Mohon isi semua field!")</script>';
        } else if ($_GET['error'] == 'invalidamount') {
            echo '<script>alert("Jumlah tidak valid!")</script>';
        } else if ($_GET['error'] == 'invalidtype') {
            echo '<script>alert("Jenis transaksi tidak valid!")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager - Tambah Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
                    <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800">Tambah Transaksi</h2>
                    <p class="text-gray-600 mt-1 text-sm sm:text-base">Catat pemasukan atau pengeluaran baru Anda dengan mudah</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right hidden sm:block">
                    <p class="text-sm text-gray-500">Hari Ini</p>
                    <p class="font-bold text-xl"><?php echo date('d F Y'); ?></p>
                </div>
                <button class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-600 transition shadow-lg">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </header>

        <!-- Form Content -->
        <div class="p-4 sm:p-6 lg:p-8 max-w-4xl mx-auto">
            <form id="transactionForm" action="../transaksi/process.php" method="POST" class="bg-white rounded-3xl shadow-lg p-8 space-y-6">
                <input type="hidden" id="jenis" name="jenis" value="pemasukan">
                <!-- Jenis Transaksi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-4">Jenis Transaksi</label>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <!-- Pemasukan Card -->
                        <div id="pemasukanCard" class="border-4 border-green-500 bg-green-50 rounded-2xl p-6 cursor-pointer transition hover:shadow-lg">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center text-white flex-shrink-0">
                                    <i class="fas fa-arrow-up text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-800">Pemasukan</h3>
                                    <p class="text-sm text-green-600">Uang masuk ke rekening</p>
                                </div>
                                <div class="w-6 h-6 border-4 border-green-500 bg-green-500 rounded-full flex-shrink-0 flex items-center justify-center">
                                    <div class="w-2 h-2 bg-white rounded-full"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Pengeluaran Card -->
                        <div id="pengeluaranCard" class="border-2 border-gray-200 bg-white rounded-2xl p-6 cursor-pointer transition hover:shadow-lg hover:border-red-300">
                            <div class="flex items-start gap-4">
                                <div class="w-14 h-14 bg-red-500 rounded-2xl flex items-center justify-center text-white flex-shrink-0">
                                    <i class="fas fa-arrow-down text-xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-lg font-bold text-gray-800">Pengeluaran</h3>
                                    <p class="text-sm text-red-600">Uang keluar dari rekening</p>
                                </div>
                                <div class="w-6 h-6 border-2 border-gray-300 rounded-full flex-shrink-0"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jumlah -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Jumlah (Rp)</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-rupiah-sign"></i>
                        </span>
                        <input 
                            type="number" 
                            id="jumlah"
                            name="jumlah"
                            placeholder="0"
                            class="w-full pl-12 pr-4 py-4 text-lg border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            min="0"
                            required
                        >
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea 
                        id="deskripsi"
                        name="deskripsi"
                        rows="4"
                        placeholder="Jelaskan transaksi ini..."
                        maxlength="255"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
                        required
                    ></textarea>
                    <div class="text-right text-sm text-gray-400 mt-1">
                        <span id="charCount">0</span>/255
                    </div>
                </div>

                <!-- Tanggal -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-calendar"></i>
                        </span>
                        <input 
                            type="date" 
                            id="tanggal"
                            name="tanggal"
                            value="<?php echo date('Y-m-d'); ?>"
                            class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            required
                        >
                    </div>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-xl transition transform hover:scale-[1.02] shadow-lg flex items-center justify-center gap-2"
                >
                    <i class="fas fa-plus"></i>
                    Tambah Transaksi
                </button>
            </form>

            <!-- Tips Transaksi -->
            <div class="mt-8 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-2xl p-6 border border-yellow-200">
                <div class="flex items-start gap-3 mb-4">
                    <i class="fas fa-lightbulb text-yellow-600 text-xl mt-1"></i>
                    <h3 class="font-bold text-gray-800 text-lg">Tips Transaksi</h3>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                    <div class="flex items-start gap-2">
                        <div class="w-2 h-2 bg-blue-500 rounded-full mt-1.5 flex-shrink-0"></div>
                        <p class="text-gray-700">Gunakan deskripsi yang jelas untuk memudahkan pencarian</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full mt-1.5 flex-shrink-0"></div>
                        <p class="text-gray-700">Catat transaksi segera setelah terjadi untuk akurasi</p>
                    </div>
                    <div class="flex items-start gap-2">
                        <div class="w-2 h-2 bg-purple-500 rounded-full mt-1.5 flex-shrink-0"></div>
                        <p class="text-gray-700">Periksa kembali data sebelum menyimpan</p>
                    </div>
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

        const jenisInput = document.getElementById('jenis');
        const pemasukanCard = document.getElementById('pemasukanCard');
        const pengeluaranCard = document.getElementById('pengeluaranCard');
        const deskripsi = document.getElementById('deskripsi');
        const charCount = document.getElementById('charCount');

        // Toggle Jenis Transaksi
        pemasukanCard.addEventListener('click', function() {
            jenisInput.value = 'pemasukan';
            
            // Style Pemasukan (selected)
            pemasukanCard.className = 'border-4 border-green-500 bg-green-50 rounded-2xl p-6 cursor-pointer transition hover:shadow-lg';
            pemasukanCard.querySelector('.w-6').className = 'w-6 h-6 border-4 border-green-500 bg-green-500 rounded-full flex-shrink-0 flex items-center justify-center';
            pemasukanCard.querySelector('.w-6').innerHTML = '<div class="w-2 h-2 bg-white rounded-full"></div>';
            
            // Style Pengeluaran (unselected)
            pengeluaranCard.className = 'border-2 border-gray-200 bg-white rounded-2xl p-6 cursor-pointer transition hover:shadow-lg hover:border-red-300';
            pengeluaranCard.querySelector('.w-6').className = 'w-6 h-6 border-2 border-gray-300 rounded-full flex-shrink-0';
            pengeluaranCard.querySelector('.w-6').innerHTML = '';
        });

        pengeluaranCard.addEventListener('click', function() {
            jenisInput.value = 'pengeluaran';
            
            // Style Pengeluaran (selected)
            pengeluaranCard.className = 'border-4 border-red-500 bg-red-50 rounded-2xl p-6 cursor-pointer transition hover:shadow-lg';
            pengeluaranCard.querySelector('.w-6').className = 'w-6 h-6 border-4 border-red-500 bg-red-500 rounded-full flex-shrink-0 flex items-center justify-center';
            pengeluaranCard.querySelector('.w-6').innerHTML = '<div class="w-2 h-2 bg-white rounded-full"></div>';
            
            // Style Pemasukan (unselected)
            pemasukanCard.className = 'border-2 border-gray-200 bg-white rounded-2xl p-6 cursor-pointer transition hover:shadow-lg hover:border-green-300';
            pemasukanCard.querySelector('.w-6').className = 'w-6 h-6 border-2 border-gray-300 rounded-full flex-shrink-0';
            pemasukanCard.querySelector('.w-6').innerHTML = '';
        });

        // Character Counter
        deskripsi.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    </script>
</body>
</html>