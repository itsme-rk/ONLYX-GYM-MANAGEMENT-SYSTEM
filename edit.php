<?php
include "config.php";

// Check if ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve member details from the database based on the ID
    $query = "SELECT * FROM member WHERE ID = '$id'";
    $result = mysqli_query($connection, $query);

    // Check if member exists
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Assign member details to variables
        $id = $row['ID'];
        $name = $row['Name'];
        $date = $row['Date_of_Joining'];
        $dob = $row['Date_of_Birth'];
        $phone = $row['Phone'];
        $coach = $row['Coach'];
    } else {
        // Member not found, redirect back to display page or show an error message
        header("Location: members.php");
        exit();
    }
} else {
    // ID not provided, redirect back to display page or show an error message
    header("Location: members.php");
    exit();
}

// Handle form submission for updating member details
if (isset($_POST['submit'])) {
    $new_name = $_POST['name'];
    $new_date = $_POST['date'];
    $new_dob = $_POST['dob'];
    $new_phone = $_POST['phone'];
    $new_coach = $_POST['coach'];

    // Update member details in the database
    $update_query = "UPDATE member SET Name = '$new_name', Date_of_Joining = '$new_date', Date_of_Birth = '$new_dob', Phone = '$new_phone', Coach = '$new_coach' WHERE ID = '$id'";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        // Update successful, redirect back to display page or show a success message
        header("Location: members.php");
        exit();
    } else {
        // Update failed, handle error (e.g., display error message)
        echo "Update failed: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    body {
            background-color: #333;
            color: #fff;
            margin-top: 50px;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #222;
            color: #fff;
            padding: 20px;
            border: 2px solid red;
            border-radius: 10px;
        }

        .form-group label {
            color: #fff;
        }

        .form-control {
            background-color: #fff;
            color: #000;
        }

        .btn-primary {
            background-color: red;
            border: 2px solid black;
            border-radius: 20px;
            padding: 10px;
        }
</style>
</head>

<body>
    <div class="container">
        <h1>Edit Member Details</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
            </div>
            <div class="form-group">
                <label for="date">Date of Joining:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo isset($date) ? $date : ''; ?>">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo isset($dob) ? $dob : ''; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
            </div>
            <div class="form-group">
                <label for="coach">Coach:</label>
                <input type="text" class="form-control" id="coach" name="coach" value="<?php echo isset($coach) ? $coach : ''; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
        </form>
    </div>
</body>

</html>
