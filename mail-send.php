<?php

require_once 'cart-add.php';

$db_handle= new DBController();

$name = mysqli_real_escape_string($db_handle->connectDB(), $_POST['nombre']);
$email = mysqli_real_escape_string($db_handle->connectDB(), $_POST['email']);
$tel = mysqli_real_escape_string($db_handle->connectDB(), $_POST['telefono']);
$dir1 = mysqli_real_escape_string($db_handle->connectDB(), $_POST['direccion']);
$dir2 = mysqli_real_escape_string($db_handle->connectDB(), ($_POST['direccion2']));
$pais = mysqli_real_escape_string($db_handle->connectDB(), isset($_POST['pais']));
$prov = mysqli_real_escape_string($db_handle->connectDB(), isset($_POST['provincia']));

$cuerpo="<strong class='font-weight-bold'>Nombre: </strong> $name <br>";
$cuerpo.="<strong class='font-weight-bold'>Telefono: </strong> $tel <br>";
$cuerpo.="<strong class='font-weight-bold'>Direccion: </strong> $dir1 <br>";
$cuerpo.="<strong class='font-weight-bold'>Direccion 2: </strong> $dir2 <br>";
$cuerpo.="<strong class='font-weight-bold'>Provincia: </strong> $prov <br>";
$cuerpo.="<br>";
$cuerpo.="Lista de articulos";
$cuerpo.="<hr>";

$mensaje=$salida;

$to = "emi.gblotta@gmail.com, $email";
$subject = "Pedido de articulos";   //Asunto del correo
$message = "$cuerpo" . "\r\n";              //Cuerpo del mensaje
$message .= "$mensaje" . "\r\n";              //Cuerpo del mensaje
$headers  = 'MIME-Version: 1.0' . "\r\n";   //cabecera para que en el mail se interprete html
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: $email";


$enviado=mail($to, $subject, $message, $headers);

if($enviado) {
    ?>
    <script>
        alert('Pedido enviado!');
        window.location.href = 'main-page.php';
    </script>
    <?php
}else{
    ?>
    <script>
        alert('Error al enviar el pedido!');
        window.location.href = 'main-page.php';
    </script>
    <?php
}