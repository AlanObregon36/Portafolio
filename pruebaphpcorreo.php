<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$nombre = $_POST["customer_name"];
$correo = $_POST['customer_email'];
$asunto = $_POST['subject'];
$mensaje = $_POST['message'];
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'destructor5036@gmail.com';                     //SMTP username
    $mail->Password   = 'txhehgpioxwiungn';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('destructor5036@gmail.com', 'Alan Obregon');
    $mail->addAddress('destructor5036@gmail.com');     //Add a recipient
    //$mail->addAddress('destructor5036@gmail.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(false);                                  //Set email format to HTML
    $mail->Subject = $asunto;
    $mail->Body    = "Mensaje enviado a partir de este correo ".$correo."con el mensaje siguiente ". $mensaje;
 //   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    header('Location:index.html?message=1');
} catch (Exception $e) {
    header('Location:index.html?message=2');
}
?>