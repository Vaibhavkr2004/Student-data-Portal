<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student Information</title>
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
        <h2 class="text-danger">Delete Student Information</h2>
        <form action="delete.php" method="post">
            <table class="table-form">
                <tr>
                    <td class="left">Enter Roll Number to Delete:</td>
                    <td class="right">
                        <input type="text" name="roll_no" id="roll_no" class="form-control" required />
                    </td>
                </tr>
                <tr>
                    <td class="center" colspan="2">
                        <button type="submit" class="btn btn-danger">Delete Student</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </td>
                </tr>
            </table>
        </form>
        <br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $con = mysqli_connect('localhost', 'root', '', 'cse15');
            $txtroll = $_POST['roll_no'];
            $sql = "DELETE FROM `std` WHERE `roll` = '$txtroll'";
            $rs = mysqli_query($con, $sql);
            if ($rs) {
                echo "<div class='alert alert-success'>Student Information Deleted Successfully</div>";
            } else {
                echo "<div class='alert alert-danger'>Failed to delete student. Please check the roll number.</div>";
            }
        }
        ?>
    </div>
</body>
</html>
