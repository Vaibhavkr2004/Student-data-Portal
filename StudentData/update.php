<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .table-form {
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-primary">Update Student Information</h2>
        <form action="update.php" method="post" class="mb-3">
            <div class="mb-3">
                <label for="roll_no" class="form-label">Enter Roll Number to Update</label>
                <input type="text" name="roll_no" id="roll_no" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['roll_no'])) {
            $con = mysqli_connect('localhost', 'root', '', 'cse15');
            $txtroll = $_POST['roll_no'];
            $sql = "SELECT * FROM `std` WHERE `roll` = '$txtroll'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
                <form action="update.php" method="post" class="mt-3">
                    <input type="hidden" name="roll_no" value="<?php echo $row['roll']; ?>" />
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Class</label>
                        <input type="text" name="class" value="<?php echo $row['class']; ?>" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="text" name="age" value="<?php echo $row['age']; ?>" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CGPA</label>
                        <input type="text" name="cgpa" value="<?php echo $row['cgpa']; ?>" class="form-control" required />
                    </div>
                    <button type="submit" name="update" class="btn btn-success">Update Details</button>
                </form>
                <?php
            } else {
                echo "<div class='alert alert-danger'>Student with the provided roll number not found.</div>";
            }
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
            $txtroll = $_POST['roll_no'];
            $txtName = $_POST['name'];
            $txtClass = $_POST['class'];
            $txtAge = $_POST['age'];
            $txtCgpa = $_POST['cgpa'];
            $update_sql = "UPDATE `std` SET `name` = '$txtName', `class` = '$txtClass', `age` = '$txtAge', `cgpa` = '$txtCgpa' WHERE `roll` = '$txtroll'";
            
            if (mysqli_query($con, $update_sql)) {
                echo "<div class='alert alert-success'>Student Information Updated Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Failed to update student information.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
