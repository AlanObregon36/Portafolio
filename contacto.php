<?php
$nombre = $_POST["customer_name"];
$correo = $_POST['customer_email'];
$asunto = $_POST['subject'];
$mensaje = $_POST['message'];

echo $nombre;
echo $correo;
echo $asunto;
echo $mensaje;
?>