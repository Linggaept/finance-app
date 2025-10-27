<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header('Location: ../index.php?error=emptyfields');
        exit();
    }

    try {
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Password is correct, start session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect to dashboard
            header('Location: ../dashboard/index.php');
            exit();
        } else {
            // Invalid credentials
            header('Location: ../index.php?error=invalidcred');
            exit();
        }

    } catch (PDOException $e) {
        die("Login gagal: " . $e->getMessage());
    }
}
?>