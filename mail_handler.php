<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '1mbeesolution@gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '1mbeesolution@gmail.com';                     //SMTP username
    $mail->Password   = 'fjtazblmxsoonnvl';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                   

    //Recipients
    $mail->setFrom = $_POST["Email"];
    $mail->addAddress('1mbeesolution@gmail.com', '1MBEE Solution');     //Add a recipient

    $mail->addReplyTo('1mbeesolution@gmail.com', 'Information');


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = '';
    $mail->Body    = $_POST["message"];


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}