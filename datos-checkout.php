<?php

$id=$_SESSION["usuario_id"];
$salida="";

$query=("SELECT * FROM usuarios WHERE usuario_id='$id'");
$resultado = mysqli_query($db_handle->connectDB(), $query) or die (mysqli_error());

$row=mysqli_num_rows($resultado);
$fila=mysqli_fetch_assoc($resultado);


if($row>0) {

    $salida .= "<div class=\"mb-3\">
                        <label for=\"nombre\">Nombre</label>
                        <input name=\"nombre\" type=\"text\" class=\"form-control\" id=\"name\" value=" . $fila['nombre'] .">
                    </div>
                
                <div class=\"mb-3\">
                    <label for=\"email\">Correo <span class=\"text-muted\">(Opcional)</span></label>
                    <input name=\"email\" type=\"email\" class=\"form-control\" id=\"email\" value=" . $fila['usuario_email'] .">
                </div>";
    echo $salida;
}else{
    $salida .= "<div class=\"mb-3\">
                        <label for=\"nombre\">Nombre</label>
                        <input name=\"nombre\" type=\"text\" class=\"form-control\" id=\"name\" value=" . $_SESSION['ext-user'] .">
                    </div>
                
                <div class=\"mb-3\">
                    <label for=\"email\">Correo <span class=\"text-muted\">(Opcional)</span></label>
                    <input name=\"email\" type=\"email\" class=\"form-control\" id=\"email\" value=" . $_SESSION['ext-email'] .">
                </div>";
    echo $salida;
}
