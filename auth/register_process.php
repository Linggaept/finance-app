<?php
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
        die('Mohon isi semua field yang wajib!');
    }

    if (strlen($password) < 6) {
        die('Password minimal 6 karakter!');
    }

    if ($password !== $confirmPassword) {
        die('Password dan konfirmasi password tidak cocok!');
    }

    // Check if username or email already exists
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    if ($stmt->fetch()) {
        die('Username atau email sudah terdaftar!');
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into the database
    try {
        $stmt = $db->prepare("INSERT INTO users (username, email, phone, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $email, $phone, $hashed_password]);
        
        // Redirect to login page after successful registration
        header('Location: ../index.php?status=registered');
        exit();

    } catch (PDOException $e) {
        die("Registrasi gagal: " . $e->getMessage());
    }
}
?>