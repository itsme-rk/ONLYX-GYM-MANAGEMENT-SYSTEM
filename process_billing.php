<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $billing_id = $_POST['billing_id'];
    $member_id = $_POST['member_id'];
    $plan = $_POST['plan'];
    $amount = $_POST['amount'];
    $billing_date = $_POST['billing_date'];
    $payment_option = $_POST['payment_option'];

    // Prepare and execute query to insert data into the billing table
    $query = "INSERT INTO billing (billing_id, member_id, plan, amount, billing_date, payment_option) VALUES ('$billing_id', '$member_id', '$plan', '$amount', '$billing_date', '$payment_option')";
    
    if(mysqli_query($connection, $query)) {
        $message = "Billing details added successfully.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
} else {
    echo "Invalid request method.";
}
?>

