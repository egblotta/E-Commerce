<?php
require "DBController.php";

$db_handle= new DBController();

$salida="";
$query="select * from usuarios ORDER BY usuario_id";

if(isset($_POST['consulta'])){
    $q=mysqli_real_escape_string($db_handle->connectDB(), $_POST['consulta']);
    $query="select * from usuarios WHERE usuario_nombre LIKE '%".$q."%' OR nombre LIKE '%".$q."%' OR dni LIKE '%".$q."%'";
}

$resultado= mysqli_query($db_handle->connectDB(), $query);

$row=mysqli_num_rows($resultado);

if($row>0) {
    $salida .= "<table border=1 class='table table-bordered table-responsive-md table-striped text-center'>
                        <thead>
                                <tr class='text-dark text-uppercase table-success'>
                                    <th class='font-weight-bold'>Id</th>
                                    <th class='font-weight-bold'>Usuario</th>
                                    <th class='font-weight-bold'>Email</th>
                                    <th class='font-weight-bold'>Nombre</th>    
                                    <th class='font-weight-bold'>Rol</th>                                                                                                                              
                 </tr>
                                </thead>                                
                                <tbody>";

    while ($fila = mysqli_fetch_assoc($resultado)) {

        $salida .= "<tr>
            <td>" . $fila['usuario_id'] . "</td>
            <td>" . $fila['usuario_nombre'] . "</td>
            <td>" . $fila['usuario_email'] . "</td>
            <td>" . $fila['nombre'] . "</td>
            <td>" . $fila['rol'] . "</td>
            
        </tr>";
    }
    $salida .= "</tbody></</table>";
}else{
    $salida.="No hay datos :(";
}
echo $salida;
