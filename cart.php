<?php

require_once 'ValidacionSesion.php';

$aCarrito = array();
$sHTML = '';
$salida='';
$check='';

//Vaciamos el carrito

if(isset($_GET['vaciar'])) {
unset($_COOKIE['carrito']);
}

//Obtenemos los productos anteriores

if(isset($_COOKIE['carrito'])) {
$aCarrito = unserialize($_COOKIE['carrito']);
}

$codigo = mysqli_real_escape_string($db_handle->connectDB(), $_GET['codigo']);  //paso solamente el codigo por get y lo busco en la bd
$cantidad=mysqli_real_escape_string($db_handle->connectDB(), $_GET['cantidad']);

$query=("SELECT * FROM articulos WHERE codigo = '$codigo'");
$resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());
$fila = mysqli_fetch_assoc($resultado); //guardo los resultados encontrados en una variable


//Añado el articulo al array (carrito)
if(isset($fila['nombre']) && isset($fila['precio'])) {
$iUltimaPos = count($aCarrito);
$aCarrito[$iUltimaPos]['nombre'] = $fila['nombre'];
$aCarrito[$iUltimaPos]['precio'] = $fila['precio'];
$aCarrito[$iUltimaPos]['codigo'] = $fila['codigo'];
$aCarrito[$iUltimaPos]['codigo'] = $cantidad;
}

//Creamos la cookie y la serializamos

$iTemCad = time() + (60 * 60);
setcookie('carrito', serialize($aCarrito), $iTemCad);




