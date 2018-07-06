<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

$mail = new PHPMailer(true);                                // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 0;                                   // Enable verbose debug output
    $mail->isSMTP();                                        // Set mailer to use SMTP
    $mail->Host = 'mailcatcher';                            // Specify main and backup SMTP servers
    $mail->Port = 1025;                                     // TCP port to connect to

    //Recipients
    $mail->setFrom('test@lamp-stack.com', 'PHP Mailer');
    $mail->addAddress('you@example.com', 'You');          // Add a recipient

    //Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent<br>';
    echo '<strong>Check <a href="http://mailcatcher.localhost">http://mailcatcher.localhost</a></strong>';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

?>