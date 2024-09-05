<?php
require 'config.php';
session_start();

$job_id = $_GET['job_id'];
$recruiter_id = $_SESSION['user_id'];

$sql = "INSERT INTO applications (job_id, recruiter_id) VALUES (?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$job_id, $recruiter_id]);

header('Location: applied.php');
?>