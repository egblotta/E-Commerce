<?php

$id=$_SESSION["usuario_id"];
$salida="";

$query=("SELECT * FROM usuarios WHERE usuario_id = '$id'");
$resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

$row=mysqli_num_rows($resultado);
$fila=mysqli_fetch_assoc($resultado);


if($row>0) {

    $salida .= "<h2 class=\"my-4 text-center align-bottom\">Mis datos</h2>
                <h4 class=\"text-left font-weight-bold\">Datos cuenta</h4>
                <div class=\"md-form input-group mb-3\">
                    <div class=\"input-group-prepend\">
                        <span class=\"input-group-text md-addon\" id=\"inputGroupMaterial-sizing-default\"><i 
                        class=\"fa fa-user\"></i></span>
                    </div>
                    <input type=\"text\" class=\"form-control\" aria-label=\"Sizing example input\" 
                    aria-describedby=\"inputGroupMaterial-sizing-default\" name=\"usuario_nombre\" value=" . $fila['usuario_nombre'] .">
                </div>
                <!-- Material input -->
                <div class=\"md-form input-group mb-3\">
                    <div class=\"input-group-prepend\">
                        <span class=\"input-group-text md-addon\" id=\"inputGroupMaterial-sizing-default\"><i 
                        class=\"fa fa-envelope\"></i></span>
                    </div>
                    <input type=\"email\" class=\"form-control\" aria-label=\"Sizing example input\" 
                    aria-describedby=\"inputGroupMaterial-sizing-default\" name=\"usuario_email\" value=" . $fila['usuario_email'] .">
                </div>
                <br>
                <h4 class=\"text-left font-weight-bold\">Datos personales</h4>
                <br>
                <h6 class=\"text-left font-weight-bold\">Nombre</h6>

                <div class=\"md-form input-group mb-3\">
                    <div class=\"input-group-prepend\">
                        <span class=\"input-group-text md-addon\" id=\"inputGroupMaterial-sizing-default\"><i 
                        class=\"fa fa-user\"></i></span>
                    </div>
                    <input type=\"text\" class=\"form-control\" aria-label=\"Sizing example input\" 
                    aria-describedby=\"inputGroupMaterial-sizing-default\" name=\"nombre\" value=" . $fila['nombre'] .">
                </div>";
}
echo $salida;
