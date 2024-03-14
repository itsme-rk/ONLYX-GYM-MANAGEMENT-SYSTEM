<?php
include "config.php";

// Check if ID parameter exists in URL
if(isset($_GET['id'])) {
    // Sanitize the ID before using it in the query to prevent SQL injection
    $id = mysqli_real_escape_string($connection, $_GET['id']);

    // Prepare a delete statement
    $sql = "DELETE FROM receptionist WHERE id = $id";

    // Execute the delete statement
    if(mysqli_query($connection, $sql)) {
        // If the delete operation was successful, redirect back to receptionist.php
        header("Location: receptionist.php");
        exit(); // Stop executing the script
    } else {
        // If there was an error in the delete operation, display an error message
        echo "Error deleting receptionist: " . mysqli_error($connection);
    }
} else {
    // If no ID parameter is provided in the URL, redirect back to receptionist.php
    header("Location: receptionist.php");
    exit(); // Stop executing the script
}
?>
