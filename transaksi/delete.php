<?php
require_once '../auth/check_session.php';
require_once '../config/database.php';

if (isset($_GET['id'])) {
    $transaction_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    try {
        // First, verify the transaction belongs to the logged-in user
        $stmt = $db->prepare("SELECT * FROM transactions WHERE id = ? AND user_id = ?");
        $stmt->execute([$transaction_id, $user_id]);
        $transaction = $stmt->fetch();

        if ($transaction) {
            // The transaction belongs to the user, so delete it
            $delete_stmt = $db->prepare("DELETE FROM transactions WHERE id = ?");
            $delete_stmt->execute([$transaction_id]);
            
            header('Location: index.php?status=deleted');
            exit();
        } else {
            // Transaction not found or doesn't belong to the user
            header('Location: index.php?error=unauthorized');
            exit();
        }

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header('Location: index.php');
    exit();
}
?>