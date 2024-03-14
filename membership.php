<?php
include "config.php"; // Include your database configuration file

// Check if membership form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['membership_submit'])) {
    // Prepare and bind parameters
    $stmt_membership = $connection->prepare("INSERT INTO membership (plan, monthly_price, annual_price, access) VALUES (?, ?, ?, ?)");
    $stmt_membership->bind_param("ssss", $plan, $monthly_price, $annual_price, $access);

    // Set parameters and execute
    $plan = $_POST['plan'];
    $monthly_price = $_POST['monthly_price'];
    $annual_price = $_POST['annual_price'];
    $access = $_POST['access'];

    if ($stmt_membership->execute()) {
        echo "New membership record created successfully";
    } else {
        echo "Error: " . $stmt_membership->error;
    }

    // Close membership statement
    $stmt_membership->close();
}

// Check if schedule form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['schedule_submit'])) {
    // Prepare and bind parameters
    $stmt_schedule = $connection->prepare("INSERT INTO schedule (day, workout_type, diet_plan) VALUES (?, ?, ?)");
    $stmt_schedule->bind_param("sss", $day, $workout_type, $diet_plan);

    // Set parameters and execute
    $day = $_POST['day'];
    $workout_type = $_POST['workout_type'];
    $diet_plan = $_POST['diet_plan'];

    if ($stmt_schedule->execute()) {
        echo "New schedule record created successfully";
    } else {
        echo "Error: " . $stmt_schedule->error;
    }

    // Close schedule statement
    $stmt_schedule->close();
}

// Retrieve membership data
$query_membership = "SELECT * FROM membership";
$result_membership = mysqli_query($connection, $query_membership);

// Retrieve schedule data
$query_schedule = "SELECT * FROM schedule";
$result_schedule = mysqli_query($connection, $query_schedule);

// Close connection
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership and Schedule</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
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

        .btn {
            margin-left: 45%;
            margin-top: 5px;
            background-color: red;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
        }

        .form-control {
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
    </style>
</head>

<body>
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

    <!-- Membership Form -->
    <div class="container">
        <h1 style="text-align:center; color:#fff; margin-top: 25px;">Membership Form</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="plan">Plan:</label>
                <select class="form-control" id="plan" name="plan">
                    <option value="basic">Basic</option>
                    <option value="elite">Elite</option>
                    <option value="pro">Pro</option>
                    <option value="home">Home (Virtual)</option>
                    <option value="personal_trainer">Personal Trainer (Home)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="monthly_price">Monthly Price:</label>
                <input type="text" class="form-control" id="monthly_price" name="monthly_price">
            </div>
            <div class="form-group">
                <label for="annual_price">Annual Price:</label>
                <input type="text" class="form-control" id="annual_price" name="annual_price">
            </div>
            <div class="form-group">
                <label for="access">Access:</label>
                <select class="form-control" id="access" name="access">
                    <option value="india">India</option>
                    <option value="elite_gyms">Elite Gyms</option>
                    <option value="particular">Particular</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="membership_submit">Submit</button>
        </form>
    </div>

    <!-- Schedule Form -->
    <div class="container">
        <h1 style="text-align:center; color:#fff; margin-top: 25px;">Schedule Form</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="day">Day:</label>
                <select class="form-control" id="day" name="day">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>

            <div class="form-group">
                <label for="workout_type">Workout Type:</label>
                <select class="form-control" id="workout_type" name="workout_type">
                    <option value="Cardio">Cardio</option>
                    <option value="Strength Training">Strength Training</option>
                    <option value="Yoga">Yoga</option>
                    <option value="Pilates">Pilates</option>
                    <option value="Zumba">Zumba</option>
                    <!-- Add more options as needed -->
                </select>
            </div>

            <div class="form-group">
                <label for="diet_plan">Diet Plan:</label>
                <select class="form-control" id="diet_plan" name="diet_plan">
                    <option value="low_carb">Low Carb</option>
                    <option value="high_protein">High Protein</option>
                    <option value="vegetarian">Vegetarian</option>
                    <option value="vegan">Vegan</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="schedule_submit">Submit</button>
        </form>
    </div>
    <br>
    <!-- Membership Table -->
    <div class="details-section">
        <h2 style="text-align:center; color:#fff; margin-top: 25px;">Membership Data</h2>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Plan</th>
                    <th>Monthly Price</th>
                    <th>Annual Price</th>
                    <th>Access</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result_membership)) {
                    echo "<tr>";
                    echo "<td>" . $row['plan'] . "</td>";
                    echo "<td>" . $row['monthly_price'] . "</td>";
                    echo "<td>" . $row['annual_price'] . "</td>";
                    echo "<td>" . $row['access'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <br>

    <!-- Schedule Table -->
    <div class="details-section">
        <h2 style="text-align:center; color:#fff; margin-top: 25px;">Schedule Data</h2>
        <table class="details-table">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Workout Type</th>
                    <th>Diet Plan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result_schedule)) {
                    echo "<tr>";
                    echo "<td>" . $row['day'] . "</td>";
                    echo "<td>" . $row['workout_type'] . "</td>";
                    echo "<td>" . $row['diet_plan'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
        <span class="text-muted">© 2024 OnlyX Management System. All rights reserved.</span>
    </div>
</footer>
</body>

</html>
