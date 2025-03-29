<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }

        .container {
            width: 80%;
            margin-top: 50px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-size: 1.2rem;
        }

        td {
            background-color: #f9f9f9;
            font-size: 1rem;
            color: #333;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #e0f7fa;
            cursor: pointer;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .no-results {
            text-align: center;
            color: #f44336;
            font-size: 1.2rem;
        }

        .message {
            text-align: center;
            font-size: 1.2rem;
            color: #333;
        }

        .message span {
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <?php

    // Create connection
    $con = mysqli_connect('localhost', 'root', '', 'cse15');

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get input values safely
    $name = isset($_GET['name']) ? trim($_GET['name']) : '';
    $roll = isset($_GET['roll']) ? trim($_GET['roll']) : '';

    if ($name && $roll) {
        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM std WHERE name = ? AND roll = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("ss", $name, $roll);
        $stmt->execute();
        $result = $stmt->get_result();

        echo "<h2>Student Information</h2>";

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Roll</th><th>Name</th><th>Class</th><th>Age</th><th>CGPA</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                          <td>" . htmlspecialchars($row["roll"]) . "</td>
                          <td>" . htmlspecialchars($row["name"]) . "</td>
                          <td>" . htmlspecialchars($row["class"]) . "</td>
                          <td>" . htmlspecialchars($row["age"]) . "</td>
                          <td>" . htmlspecialchars($row["cgpa"]) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<div class='no-results'>No results found.</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='message'>Please provide both <span>Name</span> and <span>Roll Number</span>.</div>";
    }

    $con->close();

    ?>
</div>

</body>
</html>
