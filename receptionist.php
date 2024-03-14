<?php
include "config.php";

if (isset($_REQUEST["submit"])) {
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $date = $_REQUEST["date"];
    $address = $_REQUEST["address"];
    $phone = $_REQUEST["phone"];

    $ins = "INSERT INTO receptionist (id,name, date,address,phone) VALUES ('$id','$name','$date','$address','$phone')";
    $query1 = mysqli_query($connection, $ins);
}       

// Retrieve all receptionists' data
$query = "SELECT * FROM receptionist";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receptionists</title>
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
    </style>
</head>
<body>
    <!-- Navigation Bar -->
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
    <!-- End Navigation Bar -->

    <!-- Add New Receptionist Form -->
    <h1 style="text-align:center; color:#fff; margin-top: 25px;">ADD NEW Receptionist </h1>
    <form>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">ID</label>
                <input type="text" name="id" class="form-control" id="inputEmail4" placeholder="ID">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Name</label>
                <input type="text" name="name" class="form-control" id="inputPassword4" placeholder="Name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Date of Birth</label>
            <input type="date" name="date" class="form-control" id="inputAddress" placeholder="">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address</label>
            <input type="address" name="address" class="form-control" id="inputAddress2" placeholder="Address">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Phone</label>
            <input type="text" name="phone" class="form-control" id="inputAddress2" placeholder="Phone">
        </div>
        <button type="submit"  name= "submit" class="btn btn-primary">Save</button>
    </form>
    <!-- End Add New Receptionist Form -->
    
    <!-- Existing Receptionists Table -->
    <h1 style="text-align:center; color:#fff; margin-top: 25px;">Exisiting Receptionists </h1>
    <div class="details-section">
        <table class="details-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    
                </tr>
            </thead>
            <tbody>

            <?php
// Loop through the result set and display each receptionist's data in the table
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['phone'] . "</td>";
    echo "<td>";
    echo "<div class='btn-group'>";
    echo "<td><a href='receptionist.edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a></td>";
    echo "<td><a href='receptionist.delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a></td>";
    echo "</div>";
    echo "</td>";
    echo "</tr>";
}
?>


        </tbody>
    </table>
</section>
            </tbody>
        </table>
    </div>
    <!-- End Existing Receptionists Table -->

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="container text-center">
            <span class="text-muted">© 2024 OnlyX Management System. All rights reserved.</span>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Bootstrap Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
