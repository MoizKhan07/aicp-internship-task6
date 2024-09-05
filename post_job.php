<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            color: #ffeb3b;
            margin-bottom: 20px;
        }

        .container {
            background: linear-gradient(145deg, #1e1e1e, #2c2c2c);
            border-radius: 10px;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            transition: box-shadow 0.3s ease-in-out;
        }

        .container:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #333;
            border-radius: 5px;
            background: #2c2c2c;
            color: #e0e0e0;
            font-size: 16px;
            transition: background 0.3s, border 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            background: #3a3a3a;
            border-color: #ffeb3b;
            outline: none;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #ffeb3b;
            color: #121212;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #fbc02d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Post a New Job</h1>
        <form action="post_job_action.php" method="post">
            <input type="text" name="title" placeholder="Job Title" required>
            <input type="number" name="salary" placeholder="Salary" required>
            <textarea name="description" placeholder="Job Description" required></textarea>
            <input type="number" name="experience" placeholder="Required Experience (years)" required>
            <input type="number" name="incentive" placeholder="Incentive (PKR)" required>
            <button type="submit">Post Job</button>
        </form>
    </div>
</body>
</html>
