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
            <a href="#" class="flex items-center gap-3 px-4 py-3 hover:bg-slate-600 rounded-xl transition">
                <i class="fas fa-chart-line text-lg"></i>
                <div>
                    <p class="font-semibold">Dashboard</p>
                    <p class="text-xs text-gray-300">Overview & Analytics</p>
                </div>
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-slate-600 rounded-xl hover:bg-slate-500 transition">
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
                <h2 class="text-3xl font-bold text-gray-800">Tambah Transaksi</h2>
                <p class="text-gray-600 mt-1">Catat pemasukan atau pengeluaran baru Anda dengan mudah</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500">Hari Ini</p>
                    <p class="font-bold text-xl">27 October 2025</p>
                </div>
                <button class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center text-white hover:bg-green-600 transition shadow-lg">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </header>

        <!-- Form Content -->
        <div class="p-8 max-w-4xl mx-auto">
            <form id="transactionForm" class="bg-white rounded-3xl shadow-lg p-8 space-y-6">
                
                <!-- Jenis Transaksi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-4">Jenis Transaksi</label>
                    <div class="grid grid-cols-2 gap-4">
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
                            placeholder="0"
                            class="w-full pl-12 pr-4 py-4 text-lg border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            min="0"
                        >
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea 
                        id="deskripsi"
                        rows="4"
                        placeholder="Jelaskan transaksi ini..."
                        maxlength="255"
                        class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"
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
                            value="2025-10-27"
                            class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
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
        let jenisTransaksi = 'pemasukan'; // default

        const pemasukanCard = document.getElementById('pemasukanCard');
        const pengeluaranCard = document.getElementById('pengeluaranCard');
        const deskripsi = document.getElementById('deskripsi');
        const charCount = document.getElementById('charCount');

        // Toggle Jenis Transaksi
        pemasukanCard.addEventListener('click', function() {
            jenisTransaksi = 'pemasukan';
            
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
            jenisTransaksi = 'pengeluaran';
            
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

        // Form Submit
        document.getElementById('transactionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const jumlah = document.getElementById('jumlah').value;
            const deskripsiValue = deskripsi.value;
            const tanggal = document.getElementById('tanggal').value;
            
            if (!jumlah || jumlah <= 0) {
                alert('Mohon masukkan jumlah yang valid!');
                return;
            }
            
            if (!deskripsiValue.trim()) {
                alert('Mohon masukkan deskripsi transaksi!');
                return;
            }
            
            const data = {
                jenis: jenisTransaksi,
                jumlah: jumlah,
                deskripsi: deskripsiValue,
                tanggal: tanggal
            };
            
            console.log('Transaksi baru:', data);
            alert(`Transaksi ${jenisTransaksi} berhasil ditambahkan!\n\nJumlah: Rp ${parseInt(jumlah).toLocaleString('id-ID')}\nDeskripsi: ${deskripsiValue}\nTanggal: ${tanggal}`);
            
            // Reset form
            this.reset();
            document.getElementById('tanggal').value = '2025-10-27';
            charCount.textContent = '0';
        });
    </script>
</body>
</html>