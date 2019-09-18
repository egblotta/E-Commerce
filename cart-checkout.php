<?php
require_once 'cart.php';

$fPrecioTotal = 0;

foreach ($aCarrito as $key => $value) {
    $fPrecioTotal += $value['precio'];
    $precioIva=$fPrecioTotal*1.21;
    $pFinal=number_format($precioIva,   2,".",",");
}

$cart=count($aCarrito);

if($cart!=0) {

    $salida .= "<h4 class=\"d-flex justify-content-between align-items-center mb-3\">
                <span class=\"text-muted\">Tu carrito</span>
                <span class=\"badge badge-secondary badge-pill\">".$cart."</span>
            </h4>
            <table class=\"table table-hover\">
                                <thead>
                                <tr>
                                    <th  class='font-weight-bold'>Codigo</th>
                                    <th  class='font-weight-bold'>Producto</th>
                                    <th  class='font-weight-bold'>Precio</th>
                                </tr>
                                </thead>
                                </table>";
             foreach ($aCarrito as $key => $value) {
                 $salida .= "<ul class=\"list-group mb-3\">
                <li class=\"list-group-item d-flex justify-content-between text-center\">
                    <div>
                        <h6 class=\"my-0\">" . $value['codigo'] . "</h6>
                    </div>
                    <div>
                        <h6 class=\"my-0\">" . $value['nombre'] . "</h6>
                    </div>
                    <span class=\"text-muted\">" . $value['precio'] . "</span>
                </li>";
             }
                 $salida .= "<li class=\"list-group-item d-flex justify-content-between\">
                    <span>Total (IVA incluido)</span>
                    <strong class='font-weight-bold'>".'$ ' . $pFinal . "</strong>
                </li>
            </ul>";
}else{
    $salida.="El carrito esta vacio :(";
}
echo $salida;

