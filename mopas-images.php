<?php

$db_handle= new DBController();

$salida="";
$query="select * from articulos WHERE categoria='Mopas' ORDER BY precio ";   //limitado al numero de ofertas

$resultado= mysqli_query($db_handle->connectDB(), $query);

$row=mysqli_num_rows($resultado);

if($row>0) {

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $salida.="
                  
                <div class=\"col-lg-4 col-md-6 mb-4\">
                    <div class=\"card h-100\">
                        <a><img class='card-img-top' src=".$fila['imagen']." alt='imagen'></a>
                        <div class='card-body align-top=100px;'>
                            <h4 class='card-title'>
                                <a class='text-primary'>" . $fila['nombre'] . "</a>
                            </h4>
                            <h5>".'$ ' . $fila['precio'] . "</h5>
                            <p class='card-text'>*Los precios detallados no incluyen IVA</p>
                        </div>";

        if ($isLoggedIn) {

            $salida.="<div class=\"card-footer text-center\">                      
                          <a id='" . $fila['codigo'] . "' class=\"btn btn-sm btn-success\" onclick='agregar(this.id)'>Agregar</a>                            
                        </div>";
        }
        $salida.="  </div>
                </div>";
    }
}
echo $salida;
