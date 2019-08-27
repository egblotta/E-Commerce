<?php
require "DBController.php";

$db_handle = new DBController();
$id= mysqli_real_escape_string($db_handle->connectDB(), $_POST['codigo']);

$consulta="DELETE FROM articulos WHERE id='$id'";
$resultado=mysqli_query($db_handle->connectDB(),$consulta);

if ($resultado) {
    ?>
    "<script>
        window.location.href= 'articulos-menu.php';
    </script>";
    <?php

} else {
    ?>
    "<script>
        alert('El articulo no se pudo eliminar');
        window.location.href= 'articulos-menu.php';
    </script>";
    <?php
}