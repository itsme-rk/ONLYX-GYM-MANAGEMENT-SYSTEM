<?php
include "config.php";

// Check if ID is provided in the URL parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete associated billing records first
    $delete_billing_query = "DELETE FROM billing WHERE member_id = '$id'";
    $delete_billing_result = mysqli_query($connection, $delete_billing_query);

    if ($delete_billing_result) {
        // Now delete the member record
        $delete_query = "DELETE FROM member WHERE id = '$id'";
        $delete_result = mysqli_query($connection, $delete_query);

        if ($delete_result) {
            // Deletion successful, redirect back to display page or show a success message
            header("Location: members.php");
            exit();
        } else {
            // Deletion failed, handle error (e.g., display error message)
            echo "Member deletion failed: " . mysqli_error($connection);
        }
    } else {
        // Deletion of associated billing records failed, handle error (e.g., display error message)
        echo "Deletion of associated billing records failed: " . mysqli_error($connection);
    }
} else {
    // ID not provided, redirect back to display page or show an error message
    header("Location: members.php");
    exit();
}
?>
