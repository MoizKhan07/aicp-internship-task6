<?php
require 'config.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$role = 'recruiter';

$sql = "INSERT INTO users (username, password, role) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$username, $password, $role]);

header('Location: login.php');
?>
