<?php
include "config.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve receptionist data based on ID
    $query = "SELECT * FROM receptionist WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $receptionist = mysqli_fetch_assoc($result);

    // Check if receptionist exists
    if (!$receptionist) {
        echo "Receptionist not found.";
        exit();
    }
} else {
    echo "No receptionist ID provided.";
    exit();
}

if (isset($_POST["submit"])) {
    // Retrieve updated data from form submission
    $name = $_POST["name"];
    $date = $_POST["date"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    // Update receptionist data in the database
    $update_query = "UPDATE receptionist SET name='$name', date='$date', address='$address', phone='$phone' WHERE id='$id'";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        // Update successful, redirect back to receptionist page
        header("Location: receptionist.php");
        exit();
    } else {
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
    <title>Edit Receptionist</title>
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
    <div class="container mt-5">
        <h1>Edit Receptionist</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $receptionist['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="date">Date of Birth</label>
                <input type="date" name="date" class="form-control" id="date" value="<?php echo $receptionist['date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" value="<?php echo $receptionist['address']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" value="<?php echo $receptionist['phone']; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>
</html>
