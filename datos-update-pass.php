<?php

require_once "ValidacionSesion.php";

    $id=$_SESSION['usuario_id'];
    $new_pass = mysqli_real_escape_string($db_handle->connectDB(), password_hash($_POST['nueva_password'],PASSWORD_BCRYPT));        //encriptacion de pass con hash fuerte


        $consulta="UPDATE usuarios SET usuario_password='$new_pass' WHERE usuario_id = '$name'";
        $resultado = mysqli_query($db_handle->connectDB(), $consulta);

        if ($resultado) {
            ?>
            "<script>
                alert('Contraseña actualizada!');
                window.location.href= 'profile.php';
            </script>";
            <?php

        } else {
            ?>
            "<script>
                alert('Error al cambiar la contraseña!');
                window.location.href= 'profile.php';
            </script>";
            <?php
        }
