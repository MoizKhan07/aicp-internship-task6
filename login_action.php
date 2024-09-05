<?php
require 'config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL query to fetch user data
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Check if the user is approved
        if ($user['is_approved'] == 1) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on user role
            if ($user['role'] === 'admin') {
                header('Location: admin_dashboard.php');
            } elseif ($user['role'] === 'recruiter') {
                header('Location: recruiter_dashboard.php');
            }
            exit();
        } else {
            echo "Your account is not approved yet.";
        }
    } else {
        echo "Invalid credentials.";
    }
} else {
    echo "Invalid request.";
}
?>

