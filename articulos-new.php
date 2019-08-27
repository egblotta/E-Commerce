<?php
require "DBController.php";

$db_handle= new DBController();

    $codigo = strtoupper(mysqli_real_escape_string($db_handle->connectDB(), $_POST['codigo']));
    $nombre = strtoupper(mysqli_real_escape_string($db_handle->connectDB(), $_POST['nombre']));
    $categoria = strtoupper(mysqli_real_escape_string($db_handle->connectDB(), $_POST['categoria']));
    $precio=mysqli_real_escape_string($db_handle->connectDB(), $_POST['precio']);

    //Para subir imagenes
    $dir="Images/articulos/";
        $attachtmp  = $_FILES['imagen']['tmp_name'];
        $attachname = $_FILES['imagen']['name'];
        $destino=$dir.$attachname;

    if (($_FILES["imagen"]["type"] == "image/gif")      //archivos de imagenes aceptados unicamente
        || ($_FILES["imagen"]["type"] == "image/jpeg")
        || ($_FILES["imagen"]["type"] == "image/jpg")
        || ($_FILES["imagen"]["type"] == "image/png"))
    {
        // Ruta donde se guardarán las imágenes que subamos
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
        // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente
        $move = @move_uploaded_file($attachtmp, $destino);
    }
    else
    {
        //si no cumple con el formato
        echo "No se puede subir una imagen con ese formato ";
    }


    $query=("SELECT * FROM articulos WHERE codigo = '$codigo'");
    $resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

//verificamos que el articulo no esta registrado

    if(!$resultado || mysqli_num_rows($resultado) == 0){
        $consulta="INSERT INTO articulos (codigo, nombre, categoria, precio, imagen) VALUES ('$codigo','$nombre','$categoria','$precio','$destino')";
        $resultado = mysqli_query($db_handle->connectDB(), $consulta);
        if ($resultado) {
            ?>
            "<script>
                alert('Registrado con exito!');
                window.location.href= 'articulos-menu.php';
            </script>";
            <?php

        } else {
            ?>
            "<script>
                alert('El codigo del articulo ya existe, ingresá otro!');
                window.location.href= 'articulos-menu.php';
            </script>";
            <?php
        }
    }


