<?php
require 'config.php';
session_start();
if ($_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit();
}

$sql = "SELECT * FROM users WHERE role = 'recruiter' AND is_approved = FALSE";
$stmt = $pdo->query($sql);
$pending_recruiters = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        h1, h2 {
            color: #ffeb3b;
            margin-bottom: 20px;
        }

        a {
            color: #ffeb3b;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #fbc02d;
        }

        .container {
            margin: 2em;
            background: linear-gradient(145deg, #1e1e1e, #2c2c2c);
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 800px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

        .container:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            background: #2c2c2c;
            border: 1px solid #333;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        button {
            background: #ffeb3b;
            border: none;
            color: #121212;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #fbc02d;
        }

        
        .logout-link {
            position: absolute;
            top: 1.5em;
            right: 1em;
            display: inline-block;
            padding: 10px 20px;
            background: #ffeb3b;
            color: #121212;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px;
            transition: background 0.3s;
        }

        .logout-link:hover {
            background-color: #fbc02d;
            color: white;
        }
    </style>
</head>
<body>
    <a href="login.php" class="logout-link">Logout</a>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <h2>Pending Recruiters</h2>
        <ul>
            <?php foreach ($pending_recruiters as $recruiter): ?>
                <li>
                    <?php echo htmlspecialchars($recruiter['username']); ?>
                    <a href="approve_recruiter.php?id=<?php echo $recruiter['id']; ?>" class="button">Approve</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
