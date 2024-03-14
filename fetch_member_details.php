<?php
// Include your database connection configuration file here
include "config.php";

// Check if Member ID is provided via GET request
if(isset($_GET['memberId'])) {
    // Sanitize the input
    $memberId = mysqli_real_escape_string($connection, $_GET['memberId']);

    // Query to fetch member details from the database
    $query = "SELECT * FROM member WHERE member_id='$memberId'";

    // Execute the query
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        // Member found, fetch the details
        $row = mysqli_fetch_assoc($result);

        // Prepare response data
        $response = array(
            'name' => $row['name'],
            'username' => $row['username'],
            'gender' => $row['gender'],
            'date_of_birth' => $row['date_of_birth'],
            'phone' => $row['phone'],
            'email' => $row['email'],
            'coach' => $row['coach']
        );

        // You can also include billing details if needed
        // Fetch billing details based on Member ID from the billing table

        // Send response as JSON
        echo json_encode($response);
    } else {
        // Member not found
        $response = array('error' => 'Member not found');
        echo json_encode($response);
    }
} else {
    // Member ID not provided
    $response = array('error' => 'Member ID not provided');
    echo json_encode($response);
}
?>
