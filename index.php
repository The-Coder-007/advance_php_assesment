<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Employee Management System</h2>
        <div class="text-center mt-4">
            <a href="add_employee.php" class="btn btn-primary">Add Employee</a>
            <a href="index.php" class="btn btn-secondary">View Employees</a>
        </div>
        <br><br>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>EMPID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';
                $sql = "SELECT * FROM employee";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['first_name']."</td>
                            <td>".$row['last_name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['mobile']."</td>
                            <td><a href='edit_employee.php?id=".$row['id']."' class='btn btn-warning'>Edit</a></td>
                            <td><a href='delete_employee.php?id=".$row['id']."' class='btn btn-danger'>Delete</a></td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No Employees Found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
