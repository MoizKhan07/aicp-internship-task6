<?php
require 'config.php';
session_start();

$sql = "SELECT * FROM jobs";
$stmt = $pdo->query($sql);
$jobs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboard</title>
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
            background: linear-gradient(145deg, #1e1e1e, #2c2c2c);
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 1000px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
            margin: 20px;
        }

        .container:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        .post-job-link, .logout-link {
            display: inline-block;
            padding: 10px 20px;
            background: #ffeb3b;
            color: #121212;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px;
            transition: background 0.3s;
        }

        .post-job-link:hover, .logout-link:hover {
            background: #fbc02d;
            color: white;
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
            padding: 20px;
            margin: 10px 0;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        h3 {
            margin: 0;
            color: #ffeb3b;
        }

        p {
            margin: 5px 0;
        }

        .apply-link {
            margin-top: 10px;
            padding: 10px;
            background: #ffeb3b;
            color: #121212;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s;
        }

        .apply-link:hover {
            background: #fbc02d;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="login.php" class="logout-link" style="position: absolute; right: 1em; top: 1em;">Logout</a>
        <h1>Recruiter Dashboard</h1>
        <a href="post_job.php" class="post-job-link">Post Job</a>
        <h2>Available Jobs</h2>
        <ul>
            <?php foreach ($jobs as $job): ?>
                <li>
                    <h3><?php echo htmlspecialchars($job['title']); ?></h3>
                    <p>Salary: <?php echo htmlspecialchars($job['salary']); ?></p>
                    <p>Description: <?php echo htmlspecialchars($job['description']); ?></p>
                    <p>Experience: <?php echo htmlspecialchars($job['experience']); ?> years</p>
                    <p>Incentive: <?php echo htmlspecialchars($job['incentive']); ?> PKR</p>
                    <a href="apply_job.php?job_id=<?php echo $job['id']; ?>" class="apply-link">Apply</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
