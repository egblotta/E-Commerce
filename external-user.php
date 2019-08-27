<?php
session_start();
require "DBController.php";

$db_handle= new DBController();

$first = mysqli_real_escape_string($db_handle->connectDB(), $_POST['first_name']);      //escapa de los caracteres especiales
$id = mysqli_real_escape_string($db_handle->connectDB(), $_POST['id']);      //escapa de los caracteres especiales
$lastname = mysqli_real_escape_string($db_handle->connectDB(), $_POST['last_name']);
$email = mysqli_real_escape_string($db_handle->connectDB(), $_POST['email']);
$rol=1;
$name=$first." ".$lastname;

$query=("SELECT * FROM external_users WHERE api_id = '$id' OR email='$email'");
$resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

//verificamos que el usuario no esta registrado con un condicional

if(!$resultado || mysqli_num_rows($resultado) == 0){
    $consulta="INSERT INTO external_users (api_id, nombre, email, rol) VALUES ('$id','$name','$email','$rol')";
    $resultado = mysqli_query($db_handle->connectDB(), $consulta);
}

$_SESSION["ext-id"]=$id;
$_SESSION["ext-user"]=$name;
$_SESSION["ext-email"]=$email;
$_SESSION["rol"]=$rol;
