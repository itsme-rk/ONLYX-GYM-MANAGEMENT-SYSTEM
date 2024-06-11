x`<?php
include "config.php";

// Handle form submission for adding new coach
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $experience = $_POST["experience"];
    $salary = $_POST["salary"];

    // Insert new coach data into the database
    $insert_query = "INSERT INTO coach (name, date, experience, salary) VALUES ('$name', '$date', '$experience', '$salary')";
    $insert_result = mysqli_query($connection, $insert_query);

    if ($insert_result) {
        // Insertion successful, redirect back to coach page or show a success message
        header("Location: coach.php");
        exit();
    } else {
        // Insertion failed, handle error (e.g., display error message)
        echo "Insertion failed: " . mysqli_error($connection);
    }
}

// Retrieve all coaches' data
$query = "SELECT * FROM coach";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        span {
            color: red;
            font-weight: 600px;
        }

        .navbar-nav {
            justify-content: center;
            align-items: center;
            margin-left: 20%;
        }

        form {
            width: 80%;
            align-items: center;
            justify-content: center;
            margin-left: 130px;
            margin-top: 60px;
            background-color: #222;
            color: #fff;
            border: 2px solid red;
            padding: 20px;
            border-radius: 10px;
        }

        .form-control {
            background-color: #fff;
            color: #000;
        }

        .btn {
            margin-left: 45%;
            margin-top: 5px;
            background-color: red;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
        }

        

        .details-section {
            background-color: #333;
            padding: 20px;
            border: 2px solid red;
            border-radius: 10px;
            width: 90%;
            align-items: center;
            text-align: center;
            justify-content: center;
            margin-left: 80px;
            margin-top: 30px;
        }
        .details-section h2 {
            color: #fff;
            margin-bottom: 20px;
        }
        .details-table {
            width: 100%;
            border-collapse: collapse;
        }
        .details-table th, .details-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #fff;
        }
        .details-table th {
            background-color: red;
        }
        .details-table td {
            background-color: #444;
        }

        .footer {
            width: 100% !important;
        }
    </style>
</head>

<body>

    <!-- nav bar start -->
    <header>
        <h1>Admin Interface</h1>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin-login.php"><img src="logo.jpg" alt="" height="80px" width="100px"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="aland.html"><span style="font-size: larger;"><b>OnlyX Admin Page</b></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="coach.php"><b><span>Coach</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="members.php"><b><span>Members</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="membership.php"><b><span>Membership</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="receptionist.php"><b><span>receptionist</span></b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="billing.php"><b><span>billing</span></b></a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- nav bar ends -->

    <!-- form start -->
    <h1 style="text-align:center; color:#fff; margin-top: 25px;">ADD NEW COACH </h1>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" name="name" class="form-control" id="inputName" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="inputDate">Date of Birth</label>
                <input type="date" name="date" class="form-control" id="inputDate" placeholder="Date of Birth" required>
            </div>
            <div class="form-group">
                <label for="inputExperience">Experience</label>
                <input type="text" name="experience" class="form-control" id="inputExperience" placeholder="Experience"
                    required>
            </div>
            <div class="form-group">
                <label for="inputSalary">Salary</label>
                <input type="text" name="salary" class="form-control" id="inputSalary" placeholder="Salary" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>

        <!-- form end -->

        <!-- Existing Coaches -->
        <h1 style="text-align:center; color:#fff; margin-top: 25px;">Existing Coaches </h1>
        <section class="details-section">
            <h2>Member Details</h2>
            <table class="details-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Experience</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                <?php
// Loop through the result set and display each coach's data in the table
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['experience'] . "</td>";
    echo "<td>" . $row['salary'] . "</td>";
    echo "<td>";
    echo "<div class='btn-group'>";
    echo "<td><a href='edit_coach.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></td>";
    echo "<td><a href='delete_coach.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
}
?>


                </tbody>
            </table>
        </section>
        <br>
        <footer class="footer mt-auto py-3 bg-dark" style="width: 100%;">
            <div class="container text-center">
                <span class="text-muted">© 2024 OnlyX Management System. All rights reserved.</span>
            </div>
        </footer>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</body>

</html>