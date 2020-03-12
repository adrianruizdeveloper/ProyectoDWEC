<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../../phpmailer/PHPMailer.php";
require "../../phpmailer/Exception.php";
require "../../phpmailer/SMTP.php";

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

$mail = new PHPMailer(true);
//exceptions
try{
     
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    //servers
    $mail->SMTPAuth = true;
    $mail->Username = 'cinesdejaen@gmail.com';
    $mail->Password = 'pericodelospalotes';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    //Recipients
    $mail->setFrom('cinesdejaen@gmail.com', 'Cines de Jaen');
    $mail->addAddress('cinesdejaen@gmail.com', $nombre);
    
    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Contacto de ' . $nombre."(".$correo.")";
    $mail->Body = "<p>".$correo."</p><p>".$mensaje."</p>";

    $mail->send();
    echo 'Mensaje enviado a administración';
}catch (Exception $e){
    echo 'El mensaje no ha podido ser enviado';
}


?>