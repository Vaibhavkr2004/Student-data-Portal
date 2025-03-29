<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Entry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'cse15');

        $txtroll = $_POST['roll_no'];
        $txtName = $_POST['name'];
        $txtClass = $_POST['class'];
        $txtAge = $_POST['age'];
        $txtCgpa = $_POST['cgpa'];

        $sql = "INSERT INTO `std` (`roll`, `name`, `class`, `age`, `cgpa`) VALUES ('$txtroll', '$txtName', '$txtClass', '$txtAge', '$txtCgpa')";

        $rs = mysqli_query($con, $sql);

        if ($rs) {
            echo "<h3 class='text-success'>Student Information Successfully Added</h3>";
        } else {
            echo "<h3 class='text-danger'>Error: Could not insert data</h3>";
        }
        ?>
        <br>
        <a href="insertStudent.html" class="btn btn-primary">Insert Another Student</a>
        <a href="admin_pass.php" class="btn btn-secondary">Go to Admin Page</a>
    </div>
</body>
</html>
