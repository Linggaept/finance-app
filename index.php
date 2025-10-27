<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard/index.php');
    exit();
}

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'emptyfields') {
        echo '<script>alert("Mohon isi semua field!")</script>';
    } else if ($_GET['error'] == 'invalidcred') {
        echo '<script>alert("Username atau password salah!")</script>';
    }
}
if (isset($_GET['status']) && $_GET['status'] == 'registered') {
    echo '<script>alert("Registrasi berhasil! Silakan login.")</script>';
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finplus - Finance Manager - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-purple-200 via-purple-100 to-blue-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-purple-600 mb-2">Selamat Datang</h1>
            <p class="text-gray-600">Masuk ke akun Finance Manager Anda</p>
        </div>

        <!-- Form -->
        <form id="loginForm" action="auth/login_process.php" method="POST" class="space-y-6">
            <!-- Username/Email/Phone Field -->
            <div>
                <label class="flex items-center text-purple-600 font-semibold mb-2">
                    <i class="fas fa-user mr-2"></i>
                    Username / Email
                </label>
                <input
                    type="text"
                    id="username"
                    name="username"
                    placeholder="Masukkan username atau email"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    required>
            </div>

            <!-- Password Field -->
            <div>
                <label class="flex items-center text-purple-600 font-semibold mb-2">
                    <i class="fas fa-lock mr-2"></i>
                    Password
                </label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition"
                    required>
            </div>

            <!-- Login Button -->
            <button
                type="submit"
                class="w-full bg-gradient-to-r from-purple-600 to-purple-500 text-white font-semibold py-3 rounded-xl hover:from-purple-700 hover:to-purple-600 transition transform hover:scale-105 shadow-lg flex items-center justify-center gap-2">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </button>
        </form>

        <!-- Divider
        <div class="flex items-center my-6">
            <div class="flex-1 border-t border-gray-300"></div>
            <span class="px-4 text-gray-500 text-sm">atau</span>
            <div class="flex-1 border-t border-gray-300"></div>
        </div> -->

        <!-- Google Login Button -->
        <!-- <button
            id="googleLogin"
            class="w-full bg-white border border-gray-300 text-gray-700 font-semibold py-3 rounded-xl hover:bg-gray-50 transition shadow-md flex items-center justify-center gap-2">
            <img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="Google" class="w-5 h-5">
            Login dengan Google
        </button> -->

        <!-- Tips Login Box -->
        <div class="mt-6 bg-purple-50 rounded-xl p-4 border border-purple-200">
            <div class="flex items-start">
                <i class="fas fa-lightbulb text-purple-600 mt-1 mr-3"></i>
                <div>
                    <h3 class="font-semibold text-purple-800 mb-2">Tips Login:</h3>
                    <ul class="text-sm text-gray-700 space-y-1">
                        <!-- <li>• Gunakan Google untuk login yang lebih cepat</li> -->
                        <li>• Masukkan username, email, atau nomor telepon</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Register Link -->
        <div class="text-center mt-6">
            <p class="text-gray-600">
                Belum punya akun?
                <a href="register" class="text-purple-600 font-semibold hover:underline">Daftar di sini</a>
            </p>
        </div>
    </div>

    <script>
        // Google login handler
        document.getElementById('googleLogin').addEventListener('click', function() {
            alert('Fitur login dengan Google akan segera tersedia!');
        });
    </script>
</body>

</html>