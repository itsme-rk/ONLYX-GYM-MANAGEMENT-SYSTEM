<?php
include "config.php";

// Check if member ID is provided in the URL parameter
if (isset($_GET['member_id'])) {
    $member_id = $_GET['member_id'];

    // Prepare and execute query to fetch member details
    $query = "SELECT name, gender, Date_of_Birth, phone, email FROM member WHERE id = '$member_id'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Member details found, fetch and return as JSON response
            $row = mysqli_fetch_assoc($result);
            $member_details = array(
                'name' => $row['name'],
                'gender' => $row['gender'],
                'dob' => $row['Date_of_Birth'],
                'phone' => $row['phone'],
                'email' => $row['email']
            );
            // Encode the response data to JSON and return
            echo json_encode(array('success' => true, 'member' => $member_details));
        } else {
            // Member not found
            echo json_encode(array('success' => false));
        }
    } else {
        // Error in query execution
        echo json_encode(array('success' => false));
    }
} else {
    // Member ID not provided
    echo json_encode(array('success' => false));
}
?>
