<?php
include "config.php";

// Check if ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve coach details from the database based on the ID
    $query = "SELECT * FROM coach WHERE id = '$id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    // Check if coach exists
    if ($row) {
        // Coach found, display edit form
        $name = $row['name'];
        $date = $row['date'];
        $experience = $row['experience'];
        $salary = $row['salary'];
    } else {
        // Coach not found, redirect back to coach page or show an error message
        header("Location: coach.php");
        exit();
    }
} else {
    // ID not provided, redirect back to coach page or show an error message
    header("Location: coach.php");
    exit();
}

// Handle form submission for updating coach details
if (isset($_POST['submit'])) {
    $new_name = $_POST['name'];
    $new_date = $_POST['date'];
    $new_experience = $_POST['experience'];
    $new_salary = $_POST['salary'];

    // Update coach details in the database
    $update_query = "UPDATE coach SET name = '$new_name', date = '$new_date', experience = '$new_experience', salary = '$new_salary' WHERE id = '$id'";
    $update_result = mysqli_query($connection, $update_query);

    if ($update_result) {
        // Update successful, redirect back to coach page or show a success message
        header("Location: coach.php");
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
    <title>Edit Coach Details</title>
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
        <h1>Edit Coach Details</h1>
        <form method="POST">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="date">Date of Birth:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
            </div>
            <div class="form-group">
                <label for="experience">Experience:</label>
                <input type="text" class="form-control" id="experience" name="experience" value="<?php echo $experience; ?>">
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="text" class="form-control" id="salary" name="salary" value="<?php echo $salary; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
        </form>
    </div>
</body>
</html>
