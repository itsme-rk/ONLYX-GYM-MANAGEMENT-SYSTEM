<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = "karthikramesh1813@gmail.com";
    $subject = "New Message from Contact Form";
    $body = "Name: $name\nEmail: $email\nMessage: $message";

    // Gmail SMTP configuration
    $smtpHost = "smtp.gmail.com";
    $smtpPort = 587;
    $smtpUsername = "your_gmail_username";
    $smtpPassword = "your_gmail_password";

    // PHPMailer library (install it via composer or download from GitHub)
    require 'path_to_phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->Port = $smtpPort;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->setFrom($smtpUsername, 'Your Name');
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ($mail->send()) {
        echo "Email sent successfully!";
    } else {
        echo "Email sending failed: " . $mail->ErrorInfo;
    }
}
?>
