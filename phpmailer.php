<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Important: path to Composer autoload

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'abzarcamara9@gmail.com';
    $mail->Password   = 'abcdwxyz1234mnop'; // use your 16-digit app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    
    $mail->setFrom('abzarcamara3@text.com', 'Abzar'); // ✅ Match sender with login
    $mail->addAddress('abzarcamara9@example.com', 'Camara');

    $mail->isHTML(true);
    $mail->Subject = 'Test Email from PHPMailer (htdocs)';
    $mail->Body    = '✅ Hello! This email was sent using PHPMailer in XAMPP!';

    $mail->send();
    echo '✅ Email sent successfully!';
} catch (Exception $e) {
    echo "❌ Error: {$mail->ErrorInfo}";
}