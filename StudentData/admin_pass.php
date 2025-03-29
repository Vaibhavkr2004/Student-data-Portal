<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f06, #48c6ef);
            color: #fff;
            text-align: center;
            padding: 50px 0;
        }

        h2 {
            color: #fff;
            font-size: 2.5em;
        }

        p {
            font-size: 1.2em;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
            gap: 30px; /* Spacing between the boxes */
            justify-content: center;
            align-items: center;
            max-width: 800px;
            margin: 30px auto;
        }

        .box {
            background-color: #5a5aff;
            padding: 20px;
            border-radius: 8px;
            width: 250px; /* Same size for all boxes */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .box:hover {
            transform: scale(1.05);
        }

        a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            padding: 10px;
            display: block;
            text-align: center;
            border-radius: 5px;
            background-color: transparent;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #4e4eff;
        }

        .error {
            color: #ff6347;
            font-size: 1.5em;
        }
    </style>
</head>
<body>

    <?php
    // Check if the username and password parameters are set
    $user_name = isset($_GET["username"]) ? $_GET["username"] : null;
    $user_password = isset($_GET["password"]) ? $_GET["password"] : null;

    // If credentials are missing, grant access for first-time login
    if (empty($user_name) && empty($user_password)) {
        echo "<h2>Welcome, Admin!</h2>";
    }
    // If credentials are provided, check for validity
    elseif ($user_name === "vaibhav" && $user_password === "123456") {
        echo "<h2>Welcome, $user_name!</h2>";
    } else {
        echo "<h2 class='error'>Either the username or the password is incorrect.</h2>";
        exit;
    }
    ?>

    <p>Here are your available links:</p>

    <div class="container">
        <div class="box"><a href="insertStudent.html">Enter New Student Details</a></div>
        <div class="box"><a href="update.php">Update Student Details</a></div>
        <div class="box"><a href="delete.php">Delete Student Details</a></div>
        <div class="box"><a href="displayAll.php">Display All Students</a></div>
    </div>

</body>
</html>
