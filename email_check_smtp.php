
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create an instance of PHPMailer
$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP server (Gmail)
    $mail->SMTPAuth = true;         // Enable SMTP authentication
    $mail->Username = 'b21312@students.iitmandi.ac.in'; // Your Gmail username
    $mail->Password = 'mqsv awai nalc gabq'; // App password generated from Google account
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient details
    $mail->setFrom('khuranaprakul03@gmail.com', 'Prakul');
    $mail->addAddress('b21316@students.iitmandi.ac.in', 'Yash');

    // Email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'TMC';
    $mail->Body    = 'TMC';

    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>



