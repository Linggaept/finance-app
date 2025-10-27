<?php
require_once '../auth/check_session.php';
?>
<?php include '../partials/header.php'; ?>

<?php include '../partials/sidebar.php'; ?>

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
                    <p id="header-total-transaksi" class="font-bold text-lg sm:text-xl">0 item</p>
                </div>
                <a href="../kelola-data/" class="w-10 h-10 sm:w-12 sm:h-12 bg-purple-500 rounded-full flex items-center justify-center text-white hover:bg-purple-600 transition shadow-lg">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </header>

    <!-- Content -->
    <div class="p-4 sm:p-6 lg:p-8 space-y-4 sm:space-y-6">

        <!-- Stats Cards -->
        <div id="stats-cards" class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 lg:gap-6">
            <!-- Total Transaksi -->
            <div class="bg-white rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-md">
                <div class="flex flex-col sm:flex-row justify-between items-start gap-3">
                    <div class="flex-1">
                        <p class="text-gray-600 text-xs sm:text-sm mb-1">Total Transaksi</p>
                        <h3 id="stat-total" class="text-2xl sm:text-3xl font-bold">0</h3>
                        <p class="text-gray-500 text-xs sm:text-sm mt-1">Hasil filter</p>
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
                        <h3 id="stat-pemasukan" class="text-2xl sm:text-3xl font-bold text-green-600">0</h3>
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
                        <h3 id="stat-pengeluaran" class="text-2xl sm:text-3xl font-bold text-red-600">0</h3>
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
                        <p class="text-gray-600 text-xs sm:text-sm mb-1">Saldo Netto</p>
                        <h3 id="stat-saldo" class="text-2xl sm:text-3xl font-bold text-green-600">Rp 0</h3>
                        <p id="stat-saldo-ket" class="text-green-500 text-xs sm:text-sm mt-1">Positif</p>
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
                <input type="hidden" id="filter-jenis" value="semua">
                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-2">
                    <button data-type="semua" class="filter-type-btn px-3 sm:px-4 py-2 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center gap-2">
                        <i class="fas fa-list"></i>
                        <span>Semua</span>
                    </button>
                    <button data-type="pemasukan" class="filter-type-btn px-3 sm:px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2">
                        <i class="fas fa-arrow-up"></i>
                        <span>Pemasukan</span>
                    </button>
                    <button data-type="pengeluaran" class="filter-type-btn px-3 sm:px-4 py-2 text-sm bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition flex items-center gap-2">
                        <i class="fas fa-arrow-down"></i>
                        <span>Pengeluaran</span>
                    </button>
                </div>

                <!-- Dropdowns -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                    <select id="filter-bulan" class="px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="semua">Semua Bulan</option>
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

                    <select id="filter-tahun" class="px-3 sm:px-4 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="semua">Semua Tahun</option>
                        <?php
                        $currentYear = date('Y');
                        for ($i = $currentYear; $i >= $currentYear - 5; $i--) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>

                    <!-- Action Buttons -->
                    <button id="filter-btn" class="px-4 sm:px-6 py-2 text-sm bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition flex items-center justify-center gap-2">
                        <i class="fas fa-filter"></i>
                        <span>Filter</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Daftar Transaksi Table -->
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md overflow-hidden">
            <div class="p-4 sm:p-6 border-b">
                <h3 class="text-lg sm:text-xl font-bold">Daftar Transaksi</h3>
                <p id="table-title-count" class="text-gray-600 text-xs sm:text-sm mt-1">Menampilkan 0 transaksi</p>
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
                    <tbody id="transaksi-tbody">
                        <!-- Data akan diisi oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4">Edit Transaksi</h2>
        <form id="editForm">
            <input type="hidden" id="edit-id" name="id">
            <div class="space-y-4">
                <div>
                    <label for="edit-jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
                    <select id="edit-jenis" name="jenis" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="pemasukan">Pemasukan</option>
                        <option value="pengeluaran">Pengeluaran</option>
                    </select>
                </div>
                <div>
                    <label for="edit-jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                    <input type="number" id="edit-jumlah" name="jumlah" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="edit-deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="edit-deskripsi" name="deskripsi" rows="3" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>
                <div>
                    <label for="edit-tanggal" class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <input type="date" id="edit-tanggal" name="tanggal" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="mt-6 flex justify-end space-x-3">
                <button type="button" onclick="closeEditModal()" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300">Batal</button>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</div>

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
        const options = {
            day: 'numeric',
            month: 'short',
            year: 'numeric'
        };
        return new Date(dateString).toLocaleDateString('id-ID', options);
    };

    // --- DOM ELEMENTS ---
    const sidebar = document.getElementById('sidebar');
    const openSidebar = document.getElementById('openSidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');

    const filterJenisInput = document.getElementById('filter-jenis');
    const filterTypeBtns = document.querySelectorAll('.filter-type-btn');
    const filterBulanEl = document.getElementById('filter-bulan');
    const filterTahunEl = document.getElementById('filter-tahun');
    const filterBtn = document.getElementById('filter-btn');
    const transaksiTbody = document.getElementById('transaksi-tbody');

    // --- STATS ELEMENTS ---
    const headerTotalTransaksiEl = document.getElementById('header-total-transaksi');
    const statTotalEl = document.getElementById('stat-total');
    const statPemasukanEl = document.getElementById('stat-pemasukan');
    const statPengeluaranEl = document.getElementById('stat-pengeluaran');
    const statSaldoEl = document.getElementById('stat-saldo');
    const statSaldoKetEl = document.getElementById('stat-saldo-ket');
    const tableTitleCountEl = document.getElementById('table-title-count');

    // --- MODAL ELEMENTS ---
    const editModal = document.getElementById('editModal');
    const editForm = document.getElementById('editForm');

    // --- FUNCTIONS ---
    const updateUI = (transactions) => {
        transaksiTbody.innerHTML = ''; // Clear table

        // Update Stats
        let total_transaksi = transactions.length;
        let pemasukan_count = 0;
        let pengeluaran_count = 0;
        let total_pemasukan = 0;
        let total_pengeluaran = 0;

        transactions.forEach(t => {
            if (t.jenis === 'pemasukan') {
                pemasukan_count++;
                total_pemasukan += parseFloat(t.jumlah);
            } else {
                pengeluaran_count++;
                total_pengeluaran += parseFloat(t.jumlah);
            }
        });

        const saldo_netto = total_pemasukan - total_pengeluaran;

        headerTotalTransaksiEl.textContent = `${total_transaksi} item`;
        statTotalEl.textContent = total_transaksi;
        statPemasukanEl.textContent = pemasukan_count;
        statPengeluaranEl.textContent = pengeluaran_count;
        statSaldoEl.textContent = formatRupiah(saldo_netto);
        tableTitleCountEl.textContent = `Menampilkan ${total_transaksi} transaksi`;

        if (saldo_netto >= 0) {
            statSaldoEl.className = "text-2xl sm:text-3xl font-bold text-green-600";
            statSaldoKetEl.textContent = "Positif";
            statSaldoKetEl.className = "text-green-500 text-xs sm:text-sm mt-1";
        } else {
            statSaldoEl.className = "text-2xl sm:text-3xl font-bold text-red-600";
            statSaldoKetEl.textContent = "Negatif";
            statSaldoKetEl.className = "text-red-500 text-xs sm:text-sm mt-1";
        }

        // Update Table
        if (transactions.length === 0) {
            transaksiTbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-12 sm:py-16">
                            <i class="fas fa-inbox text-4xl sm:text-6xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 font-medium text-base sm:text-lg">Tidak ada data untuk filter ini</p>
                            <p class="text-gray-400 text-xs sm:text-sm mt-2">Coba ubah filter atau tambahkan transaksi baru.</p>
                        </td>
                    </tr>`;
            return;
        }

        transactions.forEach((t, index) => {
            const isPemasukan = t.jenis === 'pemasukan';
            const row = `
                    <tr class="border-b">
                        <td class="py-3 sm:py-4 px-3 sm:px-6">${index + 1}</td>
                        <td class="py-3 sm:py-4 px-3 sm:px-6">${formatDate(t.tanggal)}</td>
                        <td class="py-3 sm:py-4 px-3 sm:px-6">${t.deskripsi}</td>
                        <td class="py-3 sm:py-4 px-3 sm:px-6">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full ${isPemasukan ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'}">
                                ${t.jenis.charAt(0).toUpperCase() + t.jenis.slice(1)}
                            </span>
                        </td>
                        <td class="py-3 sm:py-4 px-3 sm:px-6 text-right font-medium ${isPemasukan ? 'text-green-600' : 'text-red-600'}">
                            ${formatRupiah(t.jumlah)}
                        </td>
                        <td class="py-3 sm:py-4 px-3 sm:px-6 text-center">
                            <button onclick="openEditModal(${t.id})" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></button>
                            <a href="delete.php?id=${t.id}" onclick="return confirm('Anda yakin ingin menghapus transaksi ini?')" class="text-red-500 hover:text-red-700 ml-2"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                `;
            transaksiTbody.insertAdjacentHTML('beforeend', row);
        });
    };

    const fetchTransactions = async () => {
        const type = filterJenisInput.value;
        const month = filterBulanEl.value;
        const year = filterTahunEl.value;

        filterBtn.disabled = true;
        filterBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        try {
            const response = await fetch(`get_transaction.php?type=${type}&month=${month}&year=${year}`);
            if (!response.ok) {
                throw new Error('Gagal mengambil data.');
            }
            const transactions = await response.json();
            updateUI(transactions);
        } catch (error) {
            console.error('Fetch error:', error);
            transaksiTbody.innerHTML = `
                    <tr>
                        <td colspan="6" class="text-center py-16">
                            <i class="fas fa-exclamation-triangle text-6xl text-red-400 mb-4"></i>
                            <p class="text-gray-600 font-medium text-lg">Oops! Terjadi Kesalahan</p>
                            <p class="text-gray-500 text-sm mt-2">Tidak dapat memuat data. Coba lagi nanti.</p>
                        </td>
                    </tr>`;
        } finally {
            filterBtn.disabled = false;
            filterBtn.innerHTML = '<i class="fas fa-filter"></i><span>Filter</span>';
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

    filterTypeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const type = btn.dataset.type;
            filterJenisInput.value = type;

            // Update button styles
            filterTypeBtns.forEach(b => {
                b.classList.remove('bg-blue-500', 'text-white');
                b.classList.add('bg-gray-100', 'text-gray-700');
            });
            btn.classList.add('bg-blue-500', 'text-white');
            btn.classList.remove('bg-gray-100', 'text-gray-700');

            fetchTransactions(); // Auto-filter on type change
        });
    });

    filterBtn.addEventListener('click', fetchTransactions);

    // --- MODAL FUNCTIONS ---
    function openEditModal(id) {
        fetch(`get_transaction.php?id=${id}`)
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                    return;
                }
                document.getElementById('edit-id').value = data.id;
                document.getElementById('edit-jenis').value = data.jenis;
                document.getElementById('edit-jumlah').value = data.jumlah;
                document.getElementById('edit-deskripsi').value = data.deskripsi;
                document.getElementById('edit-tanggal').value = data.tanggal;
                editModal.classList.remove('hidden');
                editModal.classList.add('flex');
            });
    }

    function closeEditModal() {
        editModal.classList.add('hidden');
        editModal.classList.remove('flex');
    }

    editForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('update.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.message === 'Transaksi berhasil diperbarui.') {
                    fetchTransactions(); // Refresh data instead of reloading page
                    closeEditModal();
                }
            });
    });

    // Initial Load
    document.addEventListener('DOMContentLoaded', () => {
        fetchTransactions();
    });
</script>
</body>

</html>