<?php
require "DBController.php";
$db_handle= new DBController();

$user = mysqli_real_escape_string($db_handle->connectDB(), $_POST['b']);

$query=("SELECT * FROM usuarios WHERE usuario_nombre = '$user'");
$resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

$row=mysqli_num_rows($resultado);

if($row == 0){
    echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
}else{
    echo "<span style='font-weight:bold;color:red;'>El nombre de usuario ya existe.</span>";
}