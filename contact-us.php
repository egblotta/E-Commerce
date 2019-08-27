<?php
require "DBController.php";
$db_handle= new DBController();

$name = mysqli_real_escape_string($db_handle->connectDB(), $_POST['nombre']);
$email = mysqli_real_escape_string($db_handle->connectDB(), $_POST['email']);
$reason = mysqli_real_escape_string($db_handle->connectDB(), $_POST['razon']);
$mensaje = mysqli_real_escape_string($db_handle->connectDB(), $_POST['mensaje']);

$to = "emi.gblotta@gmail.com";
$subject = "$reason";
$message = "$mensaje";
$headers = "From: $email" . "\r\n" . "CC: emi.gblotta@gmail.com";

mail($to, $subject, $message, $headers);

?>
<script>
    alert('Mensaje enviado!');
    window.location.href='main-page.php';
</script>
