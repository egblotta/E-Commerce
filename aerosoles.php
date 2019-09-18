<?php
session_start();

require_once "ValidacionSesion.php";

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

    <link href="css/toast.min.css" rel="stylesheet">

    <style>
        .map-container{
            overflow:hidden;
            padding-bottom:56.25%;
            position:relative;
            height:0;
        }
        .map-container iframe{
            left:0;
            top:0;
            height:100%;
            width:100%;
            position:absolute;
        }
    </style>

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
                <li class="nav-item">
                    <a class="nav-link" href="#map-container-google-1">Ubicacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#nosotros">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link" data-toggle="modal" data-target="#modalContactForm">Contacto</a>
                </li>
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

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">

            <h1 class="my-4">Categorias</h1>
            <div class="list-group">
                <a href="aerosoles.php" class="list-group-item">Aerosoles</a>
                <a href="alfombras.php" class="list-group-item">Alfombras</a>
                <a href="cepillos.php" class="list-group-item">Cepillos</a>
                <a href="escobillones.php" class="list-group-item">Escobillones</a>
                <a href="esponjas.php" class="list-group-item">Esponjas</a>
                <a href="mopas.php" class="list-group-item">Mopas</a>
                <a href="paños.php" class="list-group-item">Paños</a>
                <a href="palas.php" class="list-group-item">Palas de residuos</a>
                <a href="secadores.php" class="list-group-item">Secadores de piso</a>
                <a href="trapos.php" class="list-group-item">Trapos de piso</a>
                <a href="rejillas.php" class="list-group-item">Rejillas</a>
                <a href="varios.php" class="list-group-item">Varios</a>

            </div>

        </div>

        <!-- /.col-lg-3 -->

        <div class="col-lg-9">


            <br>
            <br>
            <br>
            <br>
            <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Aerosoles</h3>
            <br>
            <div class="row">

                <?php include 'aerosoles-images.php';?>              <!-- Php para cargar las imagenes en el main -->

            </div>
            <!-- /.row -->

            <br>

            <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Escribinos</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-user prefix grey-text"></i>
                                <input type="text" id="form34" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="form34">Tu nombre</label>
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-envelope prefix grey-text"></i>
                                <input type="email" id="form29" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="form29">Tu email</label>
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tag prefix grey-text"></i>
                                <input type="text" id="form32" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="form32">Razon</label>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-pencil prefix grey-text"></i>
                                <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                                <label data-error="wrong" data-success="right" for="form8">Mensaje</label>
                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-unique">Enviar <i class="fas fa-paper-plane-o ml-1"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal-->

            <!--Modal: ModalArticulo-->
            <div class="modal fade cart" id="modalArticulo" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog modal-top modal-notify modal-success modal-lg" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                        </div>

                        <!--Body-->
                        <div class="modal-detail">

                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            <!--Modal: modalRelatedContent-->

            <!-- Modal: modalCart -->
            <div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Your cart</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <!--Body-->
                        <div class="modal-body">
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <a href="checkout.php" class="btn btn-primary">Checkout</a>
                            <a href="cart.php?vaciar=1 "class="btn btn-outline-primary">Vaciar carrito</a>

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
<footer class="py-3 bg-dark fixed-bottom">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; El Lagarto 2019</p>
    </div>
    <!-- /.container -->
</footer>


<!-- Bootstrap core JavaScript -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/modal-cart.js"></script>
<script src="js/cart-add.js"></script>


</body>

</html>