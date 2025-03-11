<?php
session_start();
include 'config.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}

// Handle product deletion
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = $id";
    if ($conn->query($sql)) {
        $_SESSION['message'] = "Product deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $conn->error;
    }
    header('Location: admin.php');
    exit();
}
?>