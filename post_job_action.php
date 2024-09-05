<?php
require 'config.php';
session_start();

$title = $_POST['title'];
$salary = $_POST['salary'];
$description = $_POST['description'];
$experience = $_POST['experience'];
$incentive = $_POST['incentive'];
$recruiter_id = $_SESSION['user_id'];

$sql = "INSERT INTO jobs (title, salary, description, experience, incentive, recruiter_id) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$title, $salary, $description, $experience, $incentive, $recruiter_id]);

header('Location: recruiter_dashboard.php');
?>
