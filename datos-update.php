<?php

require "DBController.php";

$db_handle= new DBController();

    $user = mysqli_real_escape_string($db_handle->connectDB(), $_POST['usuario_nombre']);      //evita los caracteres especiales
    $email = mysqli_real_escape_string($db_handle->connectDB(), $_POST['usuario_email']);
    $nombre=mysqli_real_escape_string($db_handle->connectDB(), $_POST['nombre']);
    $doc=mysqli_real_escape_string($db_handle->connectDB(), $_POST['usuario_doc']);


    $query=("SELECT * FROM usuarios WHERE usuario_nombre = '$user' OR usuario_email='$email'");
    $resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

//verificamos que el usuario no esta registrado con un condicional

    if(!$resultado || mysqli_num_rows($resultado) == 0){
        $consulta="UPDATE usuarios SET usuario_nombre='$user', usuario_email='$email', nombre='$nombre' , dni='$doc' WHERE usuario_nombre='$user'";
        $resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

        if ($resultado) {
            ?>
            "<script>
                alert('Datos actualizados!');
                window.location.href= 'profile.php';
            </script>";
            <?php

        } else {
            ?>
            "<script>
                alert('El usuario o mail ya existen, ingresá otro!');
                window.location.href= 'profile.php';
            </script>";
            <?php
        }
        echo "<br>";
    }

?>
