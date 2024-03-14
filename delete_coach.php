<?php
include "config.php";

// Check if ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete coach from the database
    $delete_query = "DELETE FROM coach WHERE id = '$id'";
    $delete_result = mysqli_query($connection, $delete_query);

    if ($delete_result) {
        // Deletion successful, redirect back to coach page or show a success message
        header("Location: coach.php");
        exit();
    } else {
        // Deletion failed, handle error (e.g., display error message)
        echo "Deletion failed: " . mysqli_error($connection);
    }
} else {
    // ID not provided, redirect back to coach page or show an error message
    header("Location: coach.php");
    exit();
}
?>
