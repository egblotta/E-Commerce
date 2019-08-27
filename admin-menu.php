<?php
session_start();

require_once "ValidacionSesion.php";

if($_SESSION["rol"]!=0){    //si el rol es diferente a 0 no ingresa
    ?>
<script>
    alert("No tienes permiso para ingresar aca");
    windows.location.href='main-page.php';
</script>
<?php
}
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

    <title>Administrador</title>
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

    <style>
        .pt-3-half {
            padding-top: 1.4rem;
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
                <li class="nav-item">
                    <a class="nav-link" href="main-page.php">Inicio
                        <span class="sr-only"></span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin-menu.php">Admin
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-success" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> Perfil</a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="profile.php">Mi cuenta</a>
                        <a class="dropdown-item" href="Salir.php">Salir</a>
                    </div>
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
                <a href="articulos-menu.php" class="list-group-item">Articulos</a>
                <a href="admin-menu.php" class="list-group-item">Usuarios registrados</a>

            </div>

        </div>
        <!-- /.col-lg-9 -->


        <!-- Material form group -->
        <div class="col-lg-9">
                <!-- Material input -->
                <br>
                <!-- table -->
                <div class="card">
                    <h3 class="card-header text-center font-weight-bold text-uppercase py-4">Usuarios registrados</h3>
                    <div class="card-body">
                        <div id="table" class="table-editable">
                            <span class="table-add float-right mb-3 mr-2"><a href="" data-toggle="modal" data-target="#modalRegisterForm" class="text-success"><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                            <span class="table-add float-right mb-3 mr-2"><a href="" data-toggle="modal" data-target="#modalDelete" class="text-danger"><i class="fas fa-times-circle fa-2x" aria-hidden="true"></i></a></span>
                            <input class="form-control" type="text" placeholder="Buscar" aria-label="Search" name="buscar" id="buscar">
                            <br>
                            <div id="datos"></div>
                        </div>
                    </div>
                </div>
                <!-- table -->
            <!-- Material form group -->
        </div>

        <!-- /.row -->
    </div>
</div>

<div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user-register.php" name="frmReg" method="post">

            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="orangeForm-name" class="form-control validate" name="usuario_nombre" placeholder="Usuario" required>
                    <label data-error="wrong" data-success="right" for="orangeForm-name"></label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-envelope prefix grey-text"></i>
                    <input type="email" id="orangeForm-email" class="form-control validate" name="usuario_email" placeholder="Correo" required>
                    <label data-error="wrong" data-success="right" for="orangeForm-email"></label>
                </div>
                <div class="md-form mb-5">
                    <i class="fas fa-user prefix grey-text"></i>
                    <input type="text" id="orangeForm-name" class="form-control validate" name="nombre" placeholder="Nombre" required>
                    <label data-error="wrong" data-success="right" for="orangeForm-name"></label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input name="usuario_password" id="usuario_password" class="form-control validate" onkeyup='check();' type="password"
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Debe tener al menos una mayuscula, un numero y 6 o mas caracteres" placeholder="Contraseña" required="">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass"></label>
                </div>
                <div class="md-form mb-4">
                    <i class="fas fa-lock prefix grey-text"></i>
                    <input name="usuario_password2" id="usuario_password2" class="form-control validate" onkeyup='check();' type="password" placeholder="Repetir contraseña" required="">
                    <label data-error="wrong" data-success="right" for="orangeForm-pass"></label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="mostrar_contrasena" class="custom-control-input">
                    <label class="custom-control-label" for="mostrar_contrasena" onclick="mostrarPassword()">Mostrar contraseña</label>
                </div>
                <div class="text-center"><span id='message'></span></div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-deep-orange">Nuevo</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Eliminar usuario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user-delete.php" name="frmDelete" method="post">

                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <i class="fas fa-user prefix grey-text"></i>
                        <input type="text" id="usuario_id" class="form-control validate" name="usuario_id" placeholder="Ingrese el ID de usuario" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-danger" onclick="return confirmDel()">Borrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Button trigger modal-->


<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Esta seguro?</p>
            </div>
            <form action="user-delete.php" name="frmDelete" method="post">

            <!--Body-->
            <div class="modal-body">
                <i class="fas fa-times fa-4x animated rotateIn"></i>
            </div>
            <!--Footer-->
            <div class="modal-footer flex-center">
                <a type="button" class="btn btn-outline-danger" id="Si">Si</a>
                <a type="button" class="btn btn-danger waves-effect" id="No" data-dismiss="modal">No</a>
            </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalConfirmDelete-->
<!-- /.container -->

<!-- Footer -->

<!-- Footer -->
<footer class="page-footer py-3 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; EGB 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/user-search.js"></script>
<script src="js/pass.js"></script>
<script src="js/confirm.js"></script>

</body>

</html>
