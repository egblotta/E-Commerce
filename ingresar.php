<?php
require_once "login.php";
?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
    <meta name="google-signin-client_id" content="338350855120-14fuapkhcfladj1jkokg64sj03kgnqaj.apps.googleusercontent.com">
    <meta name="google-signin-scope" content="profile email">

<link rel="icon" href="favicon.ico">

    <title>Ingresar</title>
    <!-- Favicon -->
    <link rel="icon" href="Images/favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/log.css" type="text/css">

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>      <!-- Google API -->

</head>
<body>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3&appId=2628517094045562&autoLogAppEvents=1"></script>
<header>
</header>

<!-- Begin page content -->

<section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-md-4 login-sec">
                <h2 class="text-center">Bienvenido</h2>

                <form action=" " method="post" id="frmLogin">
                    <div class="error-mensaje"><?php if(isset($mensaje)) { echo $mensaje; } ?></div>
                    <div class="form-group text-center">
                        <div class="fb-login-button" data-width="" data-size="large" data-button-type="continue_with" data-auto-logout-link="true" data-use-continue-as="true"></div>
                        <div id="status">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="text-uppercase fa fa-us"></label>
                        <input name="usuario_nombre" type="text"
                               value="<?php if(isset($_COOKIE["login_usuario"])) { echo $_COOKIE["l#gin_usuario"]; } ?>" class="form-control" placeholder="Usuario" required="" >
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" class="text-uppercase"></label>
                        <input name="usuario_password" type="password"
                               value="<?php if(isset($_COOKIE["usuario_password"])) { echo $_COOKIE["usuario_password"]; } ?>" class="form-control" placeholder="Contraseña" required="">
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["login_usuario"])) { ?> checked=""
                            <?php } ?>  class="form-check-input"/>
                            <small>Recordarme</small>

                            <div class="options text-right text-md-left mt-1">
                                <small>No esta registrado? <a href="registrarse.php" class="blue-text">Registrate</a></small>
                                <br>
                                <small>Olvidó su <a href="#" class="blue-text">contraseña?</a></small>
                            </div>
                        </label>
                        <input type="submit" name="login" value="Ingresar" class="btn btn-login float-right">
                    </div>
                </form>

                <div class="copy-text">Design by EGB</div>
            </div>
            <div class="col-md-8 banner-sec">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="Images/articulos2.jpeg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
<!-- Fin container -->


<script src="js/jquery-3.4.1.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>      <!-- Google API -->
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/fb-login.js"></script>
<script src="js/google-login.js"></script>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script>window.jQuery || document.write('<script src="js/jquery.slim.min.js"><\/script>')</script>
</body>
</html>