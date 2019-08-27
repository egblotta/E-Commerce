<?php
require "DBController.php";

$db_handle= new DBController();

$user=mysqli_real_escape_string($db_handle->connectDB(), $_SESSION['usuario_nombre']);

$salida="";

$query="select * from usuarios where usuario_nombre='$user'";

$resultado= mysqli_query($db_handle->connectDB(), $query);

$row=mysqli_num_rows($resultado);