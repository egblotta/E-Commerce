<?php
require "DBController.php";
$db_handle= new DBController();

$user = mysqli_real_escape_string($db_handle->connectDB(), $_POST['uname']);

$query=("SELECT count(*) AS cntUser FROM usuarios WHERE usuario_nombre = '$user'");

$resultado = mysqli_query($db_handle->connectDB(), $query);

$row=mysqli_fetch_array($resultado);

$count= $row['cntUser'];

echo $count;