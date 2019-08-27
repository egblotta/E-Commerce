<?php
require "DBController.php";
$db_handle= new DBController();

    $user = mysqli_real_escape_string($db_handle->connectDB(), $_POST['usuario_nombre']);      //escapa de los caracteres especiales
    $pass = mysqli_real_escape_string($db_handle->connectDB(), password_hash($_POST['usuario_password'],PASSWORD_BCRYPT));        //encriptacion de pass con hash fuerte
    $email = mysqli_real_escape_string($db_handle->connectDB(), $_POST['usuario_email']);
    $nombre=mysqli_real_escape_string($db_handle->connectDB(), $_POST['nombre']);
    $rol=1;


    $query=("SELECT * FROM usuarios WHERE usuario_nombre = '$user' OR usuario_email='$email'");
    $resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

//verificamos que el usuario no esta registrado con un condicional

    if(!$resultado || mysqli_num_rows($resultado) == 0){
        $consulta="INSERT INTO usuarios (usuario_nombre, usuario_email, usuario_password, nombre, rol) VALUES ('$user','$email','$pass','$nombre','$rol')";
        $resultado = mysqli_query($db_handle->connectDB(), $consulta);
        if ($resultado) {
            ?>
            "<script>
                alert('Registrado con exito!');
                window.location.href= 'admin-menu.php';
            </script>";
            <?php

        } else {
            ?>
            "<script>
                alert('El usuario o mail ya existen, ingresà otro!');
                window.location.href= 'admin-menu.php';
            </script>";
            <?php
        }
        echo "<br>";
    }


