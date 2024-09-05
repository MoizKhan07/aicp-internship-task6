<?php
require 'config.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

$sql = "UPDATE users SET is_approved = TRUE WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: admin_dashboard.php');
?>
