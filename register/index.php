<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager - Daftar Akun</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-purple-200 via-purple-100 to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-purple-600 mb-2">Daftar Akun</h1>
            <p class="text-gray-600">Buat akun baru untuk mengelola keuangan Anda</p>
        </div>

        <!-- Form -->
        <form id="registerForm" action="../auth/register_process.php" method="POST" class="space-y-5">
            <!-- Username Field -->
            <div>
                <label class="flex items-center text-purple-600 font-semibold mb-2 text-sm">
                    <i class="fas fa-user mr-2"></i>
                    Username
                </label>
                <input 
                    type="text" 
                    id="username"
                    name="username"
                    placeholder="Masukkan username"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    required
                >
            </div>

            <!-- Email Field -->
            <div>
                <label class="flex items-center text-purple-600 font-semibold mb-2 text-sm">
                    <i class="fas fa-envelope mr-2"></i>
                    Email
                </label>
                <input 
                    type="email" 
                    id="email"
                    name="email"
                    placeholder="codetech.id@email.com"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    required
                >
            </div>

            <!-- Phone Field -->
            <div>
                <label class="flex items-center text-purple-600 font-semibold mb-2 text-sm">
                    <i class="fas fa-phone mr-2"></i>
                    Nomor Telepon <span class="text-gray-400 font-normal ml-1">(opsional)</span>
                </label>
                <input 
                    type="tel" 
                    id="phone"
                    name="phone"
                    placeholder="082162624903"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                >
            </div>

            <!-- Password Field -->
            <div>
                <label class="flex items-center text-purple-600 font-semibold mb-2 text-sm">
                    <i class="fas fa-lock mr-2"></i>
                    Password
                </label>
                <input 
                    type="password" 
                    id="password"
                    name="password"
                    placeholder="Minimal 6 karakter"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    required
                    minlength="6"
                >
            </div>

            <!-- Confirm Password Field -->
            <div>
                <label class="flex items-center text-purple-600 font-semibold mb-2 text-sm">
                    <i class="fas fa-lock mr-2"></i>
                    Konfirmasi Password
                </label>
                <input 
                    type="password" 
                    id="confirmPassword"
                    name="confirmPassword"
                    placeholder="Ulangi password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    required
                >
            </div>

            <!-- Register Button -->
            <button 
                type="submit"
                class="w-full bg-gradient-to-r from-purple-600 to-purple-500 text-white font-semibold py-3 rounded-xl hover:from-purple-700 hover:to-purple-600 transition transform hover:scale-105 shadow-lg flex items-center justify-center gap-2 mt-6"
            >
                <i class="fas fa-user-plus"></i>
                Daftar Sekarang
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="flex-1 border-t border-gray-300"></div>
            <span class="px-4 text-gray-500 text-sm">atau</span>
            <div class="flex-1 border-t border-gray-300"></div>
        </div>

        <!-- Google Register Button -->
        <button 
            id="googleRegister"
            class="w-full bg-white border border-gray-300 text-gray-700 font-semibold py-3 rounded-xl hover:bg-gray-50 transition shadow-md flex items-center justify-center gap-2"
        >
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" class="w-5 h-5">
            Daftar dengan Google
        </button>

        <!-- Tips Keamanan Box -->
        <div class="mt-6 bg-purple-50 rounded-xl p-4 border border-purple-200">
            <div class="flex items-start">
                <i class="fas fa-shield-alt text-purple-600 mt-1 mr-3"></i>
                <div>
                    <h3 class="font-semibold text-purple-800 mb-2">Tips Keamanan:</h3>
                    <ul class="text-sm text-gray-700 space-y-1">
                        <li>• Password minimal 6 karakter dengan kombinasi huruf dan angka</li>
                        <li>• Email dan nomor telepon bersifat opsional</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-6">
            <p class="text-gray-600">
                Sudah punya akun? 
                <a href="#" class="text-purple-600 font-semibold hover:underline">Login di sini</a>
            </p>
        </div>
    </div>

    <script>

        // Google register handler
        document.getElementById('googleRegister').addEventListener('click', function() {
            alert('Fitur daftar dengan Google akan segera tersedia!');
        });

        // Real-time password match validation
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirmPassword');

        confirmPassword.addEventListener('input', function() {
            if (password.value !== confirmPassword.value) {
                confirmPassword.setCustomValidity('Password tidak cocok');
            } else {
                confirmPassword.setCustomValidity('');
            }
        });
    </script>
</body>
</html>