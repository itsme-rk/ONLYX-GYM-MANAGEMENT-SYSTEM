<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['signupUsername'];
    $email = $_POST['email'];
    $password = $_POST['signupPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Check if password and confirm password match
    if($password !== $confirmPassword) {
        echo "Password and confirm password do not match";
        exit();
    }

    // Check if username already exists
    $checkQuery = "SELECT * FROM signup WHERE username='$username'";
    $checkResult = mysqli_query($connection, $checkQuery);
    $count = mysqli_num_rows($checkResult);

    if($count > 0) {
        echo "Username already exists";
        exit();
    }

    // Insert user details into the signup table
    $insertQuery = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if(mysqli_query($connection, $insertQuery)) {
        echo "Signup successful";
        header("location: index.html");
    } else {
        echo "Invalid username or password";
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
    }
} else {
    echo "Invalid request method.";
}
?>

