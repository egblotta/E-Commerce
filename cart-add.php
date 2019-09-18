<?php
require_once 'cart.php';

$fPrecioTotal = 0;

foreach ($aCarrito as $key => $value) {
    $subTotal=$value['precio']*$cantidad;
    $fPrecioTotal += $subTotal;
    $precioIva=$fPrecioTotal*1.21;
    $pFinal=number_format($precioIva,2,".",",");
}

$cart=count($aCarrito);

if($cart!=0) {

    $salida .= "                 
               <table class=\"table table-hover\">
                                <thead>
                                <tr>
                                    <th  class='font-weight-bold'>Codigo</th>
                                    <th  class='font-weight-bold'>Producto</th>
                                    <th  class='font-weight-bold'>Precio</th>
                                    <th  class='font-weight-bold'>Cantidad</th>
                                    <th  class='font-weight-bold'>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>";
    foreach ($aCarrito as $key => $value) {
        $salida .= "<tr>
                                <td>" . $value['codigo'] . "</td>
                                <td>" . $value['nombre'] . "</td>
                                <td>" . $value['precio'] . "</td>
                                <td>" . $cantidad . "</td>
                                <td>" . $subTotal . "</td>
                                 </tr>";
    }
    $salida .="<tr class=\"total\">
                               <th scope=\"row\"></th>
                                 <td class='font-weight-bold'>Total</td>
                                 <td class='font-weight-bold'>" . '$ ' . $pFinal . "</td>
                               </tr>";

    $salida .= "</tbody></</table>";

}else{
    $salida.="El carrito esta vacio :(";
}
echo $salida;

