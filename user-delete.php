<?php
require "DBController.php";
$db_handle= new DBController();

$id= mysqli_real_escape_string($db_handle->connectDB(), $_POST['usuario_id']);


$query=("SELECT * FROM usuarios WHERE usuario_id='$id'");
$resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

if(mysqli_num_rows($resultado) > 0){
    $consulta="DELETE FROM usuarios WHERE usuario_id='$id'";
    $resultado = mysqli_query($db_handle->connectDB(), $consulta) or die (mysqli_error());

if($resultado)    ?>
    <script>
        alert('Registro eliminado!');
        window.location.href= 'admin-menu.php';
    </script>
    <?php

} else {
    ?>
    <script>
        alert('El registro no existe en la BD');
        window.location.href= 'admin-menu.php';
    </script>
    <?php
}