<?php
session_start();

require_once "ValidacionSesion.php";


if($isLoggedIn && $isAdmin)
    header("admin-menu.php");

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

    <title>El Lagarto</title>
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
    <!-- Toast Messages -->
    <link href="css/toast.min.css" rel="stylesheet">

    <style>

    </style>

</head>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="main-page.php">El Lagarto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="main-page.php">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <?php
                if($isLoggedIn && $_SESSION["rol"]==0){    //unicamente los admin pueden ver este boton
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="admin-menu.php">Admin</a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if($isLoggedIn){    //unicamente los admin pueden ver este boton
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-success" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">

                            <i class="fas fa-user"></i><?php if(isset($_SESSION["usuario_nombre"])) { echo $_SESSION["usuario_nombre"];} if(isset($_SESSION['ext-user'])) { echo $_SESSION['ext-user'];} ?></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                            <?php
                            if(empty($_SESSION['ext-user'])){    //unicamente los usuarios logeados pueden ver esto
                                ?>
                                <a class="dropdown-item" href="profile.php">Mi cuenta</a>
                                <?php
                            }
                            ?>
                            <a class="dropdown-item" href="Salir.php">Salir</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-shopping-cart openMod"></i>
                    </a>
                </li>
                <?php
                if(!$isLoggedIn){    //si no esta logeado aparece este link
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="ingresar.php">Ingresar</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>Formulario de Checkout</h2>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <?php include 'cart-checkout.php'; ?>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Datos de envio</h4>
            <form action="mail-send.php" method="post">
                    <?php include 'datos-checkout.php'; ?>

                <div class="mb-3">
                    <label for="tel">Telefono</label>
                    <input type="text" name="telefono" class="form-control" id="telefono" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label for="address">Direccion 1</label>
                    <input type="text" name="direccion" class="form-control" id="direccion" placeholder="" required>
                </div>

                <div class="mb-3">
                    <label for="address2">Direccion 2</label>
                    <input type="text" name="direccion2" class="form-control" id="direccion2" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="address2">Localidad</label>
                    <input type="text" name="localidad" class="form-control" id="localidad" placeholder="">
                </div>

                <hr class="mb-4">

                <hr class="mb-4">
                <button id="1" class="btn btn-primary btn-lg btn-block" type="submit" onclick="enviar()">Enviar pedido</button>
                <br>
            </form>
        </div>
    </div>
            <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Tu carrito</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Checkout</button>
                            <a id='1' class="btn btn-outline-primary" onclick="vaciar(this.id)">Vaciar carrito</a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal: modalCart -->


        </div>
        <!-- /.col-lg-9 -->


    </div>
    <!-- /.row -->

</div>
<!-- /.container -->


<!-- Footer -->
<footer class="py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; EGB 2019</p>
    </div>
    <!-- /.container -->
</footer>


<!-- Bootstrap core JavaScript -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/modal-cart.js"></script>

</body>

</html>