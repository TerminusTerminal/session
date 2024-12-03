<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Set the SMTP server to send through
    $mail->SMTPAuth = true;
    $mail->Username = 'anselswindle@gmail.com'; // Your email address
    $mail->Password = 'sataniamcdowell';       // Your app password or Gmail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPDebug = 2; // Debug level: 2 for detailed output
    $mail->Debugoutput = 'html'; // Output in HTML format
    $mail->Port = 587;
    $mail->Host = 'localhost';
    $mail->SMTPAutoTLS = false;

    // Fix SMTPOptions syntax
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => true,
            'verify_peer_name' => true,
            'allow_self_signed' => true,
            'cafile' => 'C:\xampp\php\extras\ssl\cacert.pem',
        ),
    );

    // Recipients
    $mail->setFrom('your_email@example.com', 'Your Name');
    $mail->addAddress('recipient@example.com', 'Recipient Name');

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a <b>test email</b>';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
