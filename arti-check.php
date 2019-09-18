<?php
require "DBController.php";
$db_handle= new DBController();

$cod = mysqli_real_escape_string($db_handle->connectDB(), $_POST['cod']);

$query=("SELECT count(*) AS cntCod FROM articulos WHERE codigo = '$cod'");

$resultado = mysqli_query($db_handle->connectDB(), $query);

$row=mysqli_fetch_array($resultado);

$count= $row['cntCod'];

echo $count;