<?php

//include('mail.php'); // Assuming this includes PHPMailer setup

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer autoload if using Composer

$mail = new PHPMailer(true); 
$Tname=$_SESSION['Tname'];
$Tmobile=$_SESSION['Tmobile'];
$Tpassword=$_SESSION['Tpassword'];
$Temail=$_SESSION['Temail'];


try {
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'help@tpeg-ibiv.com';
    $mail->Password = 'Help@3110';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipient and sender
    $mail->setFrom('help@tpeg-ibiv.com', 'TPEG International');
    // $mail->addAddress('akmaurya31@gmail.com', 'Ak Maurya');
    $mail->addAddress($Temail, 'Ak Maurya');

    // HTML content
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to TPEG International!';

    $mail->Body = "
    <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            .container { max-width: 600px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; background-color: #f9f9f9; }
            .header { background-color: #4CAF50; color: white; text-align: center; padding: 20px; }
            .header img { width: 100%; height: auto; }
            .content { padding: 20px; }
            .content p { font-size: 16px; }
            .button { display: inline-block; padding: 10px 20px; font-size: 18px; color: #fff; background-color: #4CAF50; text-align: center; text-decoration: none; margin-top: 20px; }
            .footer { margin-top: 20px; font-size: 14px; text-align: center; color: #777; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <img src='https://tpeg-ibiv.com/images/mob1.jpg' alt='TPEG International Banner'>
                <h1>Welcome to TPEG International</h1>
            </div>
            <div class='content'>
                <p>Dear $Tname,</p>
                <p>Thank you for registering with TPEG International! We’re excited to have you on board.</p>
                <p>Here are your registration details:</p>
                <ul>
                    <li><strong>Mobile:</strong> $Tmobile</li>
                    <li><strong>Password:</strong> $Tpassword</li>
                </ul>
                <a href='https://tpeg-ibiv.com/login' class='button'>Login to your account</a>
            </div>
            <div class='footer'>
                <p>&copy; " . date('Y') . " TPEG International. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
    ";

    // Plain text alternative content
    $mail->AltBody = "Welcome to TPEG International!\n\nThank you for registering with us.\n\nHere are your details:\n- Mobile: $Tmobile\n- Password: $Tpassword\n\nVisit https://tpeg-ibiv.com/login to access your account.";

    $mail->send();
    echo 'Email has been sent successfully!';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>