<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';



$to = 'akmaurya31@gmail.com';
$subject = 'Test Email';
$message = 'This is a test email from PHP.';
$headers = 'From: no-reply@example.com' . "\r\n" .
           'Reply-To: no-reply@example.com' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo 'Email sent successfully!';
} else {
    echo 'Failed to send email.';
}




$mail = new PHPMailer(true);

try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';      // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'help@tpeg-ibiv.com'; // SMTP username
    $mail->Password = 'Help@3110';    // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipient and sender
    $mail->setFrom('help@tpeg-ibiv.com', 'TPEG International');
    $mail->addAddress('akmaurya31@gmail.com', 'Ak Maurya');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email from PHP using PHPMailer.';
    $mail->AltBody = 'This is the plain text version of the email content.';

    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>
