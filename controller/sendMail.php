<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

function sendVerificationMail($user)
{
    $nom = $user->getNom();
    $url = 'http://' . $_SERVER["SERVER_NAME"] . '/controller/verification.php?userId=' . $user->getUserId() . '&token=' . $user->getToken();
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'botigacarles@gmail.com';                 // SMTP username
    $mail->Password = 'BotigaCarles01';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
    $mail->SMTPDebug = 0;
    $mail->From = 'botigacarles@gmail.com';
    $mail->FromName = 'Botiga Carles';
    $mail->addAddress($user->getEmail());     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Email de Verificació";
    $mail->Body = "
        <p>Bones $nom,</p>
        <a href='$url'>Verificar</a>
    ";
    if (!$mail->send()) {
        //echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        //  echo 'Message has been sent';
    }
}

function sendChangePasswordMail($user)
{
    $url = 'http://' . $_SERVER["SERVER_NAME"] . '/controller/modifyPassController.php?userId=' . $user->getUserId() . '&token=' . $user->getToken();
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'botigacarles@gmail.com';                 // SMTP username
    $mail->Password = 'BotigaCarles01';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
    $mail->SMTPDebug = 0;
    $mail->From = 'botigacarles@gmail.com';
    $mail->FromName = 'Botiga Carles';
    $mail->addAddress($user->getEmail());     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Solicitud de canvi de contrasenya";
    $mail->Body = "
        <a href='$url'>Canviar Contrasenya</a>
    ";
    if (!$mail->send()) {
        //echo 'Message could not be sent.';
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        //  echo 'Message has been sent';
    }
}
?>
