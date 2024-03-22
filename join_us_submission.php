<?php
include "config.php"; // Include your config.php file here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $resumePath = "resumes/" . basename($_FILES["resume"]["name"]);

    $message = $_POST['message'];

    // Move uploaded file to a designated location
    move_uploaded_file($_FILES["resume"]["tmp_name"], $resumePath);

    // SQL query to insert data into the database
    $sql = "INSERT INTO JoinUsSubmissions (Name, Email, Phone, Position, ResumePath, Message) 
            VALUES ('$name', '$email', '$phone', '$position', '$resumePath', '$message')";

    if ($connection->query($sql) === TRUE) {
        // Send email notification
        $to = "karthikramesh1813@gmail.com";
        $subject = "New Join Us Submission";
        $message = "A new join us submission has been received.\n\nName: $name\nEmail: $email\nPhone: $phone\nPosition: $position";
        $headers = "From: your_email@example.com" . "\r\n";

        mail($to, $subject, $message, $headers);

        echo "Submission successful. We'll contact you soon!";
        header( 'Location: joinus.html');
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>
