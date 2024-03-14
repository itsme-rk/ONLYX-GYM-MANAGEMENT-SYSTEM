<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username and password match in the signup table
    $query = "SELECT * FROM signup WHERE username='$username' AND password='$password'";

    $result = mysqli_query($connection, $query);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        // Username and password matched, redirect to success page or perform further actions
        header("location: index.html");
    } else {
        // Username and password do not match, display error message
        echo "Invalid username or password";
    }
} else {
    echo "Invalid request method.";
}
?>
    