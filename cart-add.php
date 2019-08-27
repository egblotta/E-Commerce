<?php
require_once 'cart.php';

$fPrecioTotal = 0;

foreach ($aCarrito as $key => $value) {
    $fPrecioTotal += $value['precio'];
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
                                </tr>
                                </thead>
                                <tbody>";
    foreach ($aCarrito as $key => $value) {
        $salida .= "<tr>
                                <td>" . $value['codigo'] . "</td>
                                <td>" . $value['nombre'] . "</td>
                                <td>" . $value['precio'] . "</td>
                                 </tr>";
    }
    $salida .="<tr class=\"total\">
                               <th scope=\"row\"></th>
                                 <td class='font-weight-bold'>Total (IVA incluido)</td>
                                 <td class='font-weight-bold'>" . '$ ' . $pFinal . "</td>
                               </tr>";

    $salida .= "</tbody></</table>";

}else{
    $salida.="El carrito esta vacio :(";
}
echo $salida;

