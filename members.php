<?php
include "config.php";

// Insert new member data
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $date = $_POST["date"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $coach = $_POST["coach"];

    $ins = "INSERT INTO member (Name, username, gender, Date_of_Joining, Date_of_Birth, Phone, email, Coach) VALUES ('$name', '$username', '$gender', '$date', '$dob', '$phone', '$email', '$coach')";
    $query1 = mysqli_query($connection, $ins);
}

// Retrieve all members' data
$query = "SELECT * FROM member";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        span{
          color: red;
          font-weight: 600px;
        }
        .navbar-nav{
          justify-content: center;
          align-items: center;
          margin-left: 20%;
        }
        form{
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
        .form-control{
          background-color: #fff;
          color: #000;
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
        .btn{
            margin-left: 45%;
            margin-top: 5px;
            background-color: red;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
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
                <a class="nav-link" href="aland.html"><span style="font-size: larger;" ><b>OnlyX Admin Page</b></span></a>
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
<!-- nav bar end -->


<!-- form start -->
<!-- form start -->
<h1 style="text-align:center; color:#fff; margin-top: 25px;">ADD NEW MEMBERS </h1>
<form method="POST">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Name">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="gender">Gender</label>
        <select name="gender" class="form-control" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="form-group">
        <label for="date">Date of Joining</label>
        <input type="date" name="date" class="form-control" id="date" placeholder="Date of Joining">
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" class="form-control" id="dob" placeholder="Date of Birth">
    </div>
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group">
        <label for="coach">Coach</label>
        <input type="text" name="coach" class="form-control" id="coach" placeholder="Coach">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Save</button>
</form>
<!-- form end -->

<!-- form end -->

<!-- Display section for member details -->
<h1 style="text-align:center; color:#fff; margin-top: 25px;">Existing Members </h1>
<section class="details-section">
    <h2>Member Details</h2>
    <table class="details-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Username</th>
                <th>Gender</th>
                <th>Date of Joining</th>
                <th>Date of Birth</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Coach</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the result set and display each row in the table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['Date_of_Joining'] . "</td>";
                echo "<td>" . $row['Date_of_Birth'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['Coach'] . "</td>";
                // Edit button with a link to edit.php?id=<member_id>
                echo "<td><a href='edit.php?id=" . $row['ID'] . "' class='btn btn-primary'>Edit</a></td>";
                // Delete button with a link to delete.php?id=<member_id>
                echo "<td><a href='delete.php?id=" . $row['ID'] . "' class='btn btn-danger'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</section>
<footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
        <span class="text-muted">© 2024 OnlyX Management System. All rights reserved.</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
