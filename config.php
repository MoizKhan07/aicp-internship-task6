<?php
$dsn = 'mysql:host=localhost;dbname=task6';
$username = 'root'; // Your database username
$password = ''; // Your database password

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
