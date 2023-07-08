<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/Exception.php';
require 'PHPmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'targetfocus2020@gmail.com';                     //SMTP username
    $mail->Password   = 'jgxmfwyoheiebxaz';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    // $mail->setFrom('targetFocur2020@gmail.com', 'Mailer');
    // $mail->addAddress($_POST['email'], 'VQS mail');     //Add a recipient
 

    

    //Content

    $mail->setFrom('targetfocus2020@gmail.com', 'VSQ (Admin)'); // Sender's email address and name
    $mail->addAddress($_POST['email']); // Recipient's email address
    $mail->Subject = 'Subject of the email';
    $mail->Body = 'Password: ' . $_POST['password'] . '<br>';
    $mail->Body .= 'Email: ' . $_POST['email'] . '<br>';

    // 
    // $mail->isHTML(true);                                  //Set email format to HTML
    // $mail->Subject = 'Here is the subject';
    // $mail->Body    = 'This is the HTML message NK body <b>in bold!</b>';

    $mail->send();
    alert( 'Message has been sent');
} catch (Exception $e) {
    alert( "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
}