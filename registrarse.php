<?php
session_start();

require_once "ValidacionSesion.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Registrarse</title>
    <!-- Favicon -->
    <link rel="icon" href="Images/favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/reg.css" rel="stylesheet">

    <!------ Include the above in your HEAD tag ---------->
    <style type="text/css">


    </style>

</head>
<body>
<div class="reg-block">
    <div class="container">
        <hr>
        <div class="card bg-light">
            <div class="background-image">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center">Crea una cuenta</h4>

                    <form action="user-register.php" method="post" name="regUser">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input id="usuario_nombre" name="usuario_nombre" class="form-control" pattern="[A-Za-z]{4,}" title="Debe tener 4 letras o mas" placeholder="Usuario" type="text" required="">
                            <div id="uname_response" class="response"></div>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="nombre" class="form-control" placeholder="Nombre" type="text" required="">
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="usuario_email" class="form-control" placeholder="Correo" type="email" required="">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">

                        </div> <!-- form-group end.// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="usuario_password" id="usuario_password" class="form-control" onkeyup='check();' placeholder="Contraseña" type="password"
                                   pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Debe tener al menos una mayuscula, un numero y 6 o mas caracteres" required="">
                            <label data-error="wrong" data-success="right" for="usuario_password"></label>
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input name="usuario_password2" id="usuario_password2" class="form-control" onkeyup='check();' placeholder="Repetir contraseña" type="password" required="">
                            <label data-error="wrong" data-success="right" for="usuario_password2"></label>
                        </div> <!-- form-group// -->
                        <div class="text-center"><span id='message'></span></div>

                        <div class="custom-control custom-checkbox text-right">
                            <input type="checkbox" id="mostrar_contrasena" class="custom-control-input">
                            <label class="custom-control-label" for="mostrar_contrasena" onclick="mostrarPassword()">Mostrar contraseña</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Crear Cuenta  </button>
                        </div> <!-- form-group// -->
                        <p class="text-center">Ya estas registrado? <a href="ingresar.php">Ingresar</a> </p>
                    </form>
                </article>
            </div> <!-- card.// -->
        </div>
    </div>
</div>

<!--container end.//-->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pass.js"></script>
<script src="js/user-check.js"></script>

<!-- Bootstrap core JavaScript -->

<script>window.jQuery || document.write('<script src="js/jquery.slim.js"><\/script>')</script>

</body>
</html>