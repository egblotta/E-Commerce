<?php
session_start();

require_once "ValidacionSesion.php";

if(!$isLoggedIn) {
    header("Location: ./");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mis Datos</title>
    <!-- Favicon -->
    <link rel="icon" href="Images/favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="main-page.php">El Lagarto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="main-page.php">Inicio
                        <span class="sr-only"></span>
                    </a>
                </li>
                <?php
                if($_SESSION["rol"]==0){    //unicamente los admin pueden ver este boton
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-menu.php">Admin</a>
                    </li>
                    <?php
                }
                ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-success" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <?php if(isset($_SESSION["usuario_nombre"])) { echo $_SESSION["usuario_nombre"]; } ?></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="profile.php">Mi cuenta</a>
                        <a class="dropdown-item" href="Salir.php">Salir</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        1 <i class="fas fa-shopping-cart text-white"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4"><?php if(isset($_SESSION["usuario_nombre"])) { echo $_SESSION["usuario_nombre"]; } ?></h1>
            <div class="list-group">
                <a href="#" class="list-group-item">Compras</a>
                <a href="profile.php" class="list-group-item">Mis datos</a>
                <a href="user-pass.php" class="list-group-item">Seguridad</a>

            </div>

        </div>
        <!-- /.col-lg-9 -->


        <!-- Material form group -->
        <div class="col-lg-9">
            <form action="datos-update-pass.php" method="post" id="updProfile">
                <!-- Material input -->
                <h2 class="my-4 text-center align-bottom">Mis datos</h2>

                <hr class="black">
                <br>
                <h4 class="text-left font-weight-bold">Nueva contraseña</h4>

                <div class="md-form input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="nueva_password" id="nueva_password" class="form-control" onkeyup='check_p();' placeholder="Nueva contraseña" type="password"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Debe tener al menos una mayuscula, un numero y 6 o mas caracteres" required="">
                    <i class="fa fa-eye-slash fa-2x mr-2 mb-3" aria-hidden="true" onclick="mostrarPassword2()"></i>
                </div>

                <div class="md-form input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-default"><i class="fa fa-lock"></i></span>
                    </div>
                    <input name="nueva_password2" id="nueva_password2" type="password" class="form-control" onkeyup='check_p();' aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-default"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Debe tener al menos una mayuscula, un numero y 6 o mas caracteres" placeholder="Repetir nueva contraseña">
                </div>
                <div class="text-center"><span id='message'></span></div>
                <br>
                <input type="submit" name="login" value="Actualizar" class="btn btn-green float-center">
            </form>
            <!-- Material form group -->
        </div>

        <!-- /.row -->
    </div>
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-3 bg-dark fixed-bottom">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; El Lagarto 2019</p>
    </div>
    <!-- /.container -->
</footer>



<!-- Bootstrap core JavaScript -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pass.js"></script>

</body>

</html>