<?php
require "DBController.php";

$db_handle= new DBController();

$salida="";
$query="select * from articulos ORDER BY codigo";

if(isset($_POST['consulta'])){
    $q=mysqli_real_escape_string($db_handle->connectDB(), $_POST['consulta']);
    $query="select * from articulos WHERE nombre LIKE '%".$q."%' OR categoria LIKE '%".$q."%'";
}

$resultado= mysqli_query($db_handle->connectDB(), $query);

$row=mysqli_num_rows($resultado);   //numero de filas encontrados en esa query

if($row>0) {
    $salida .= "<div class='table-wrapper-scroll-y my-custom-scrollbar'>
                <table id='dtBasicExample' border=1 class='table table-bordered table-responsive-md text-center ' cellspacing='0'>
                        <thead>
                                     <tr class='text-dark text-uppercase table-success table-fixed'>
                                    <th class='font-weight-bold position-static'>Id</th>
                                    <th class='font-weight-bold position-static'>Codigo</th>
                                    <th class='font-weight-bold position-static'>Nombre</th>
                                    <th class='font-weight-bold position-static'>Precio</th>    
                                    <th class='font-weight-bold position-static'>Categoria</th>    
                                    <th class='font-weight-bold position-static'>Imagen</th>    
                                     </tr>
                                </thead>                                
                                <tbody>";

    while ($fila = mysqli_fetch_assoc($resultado)) {

        $salida .= "<tr>
            <td>" . $fila['id'] . "</td>
            <td>" . $fila['codigo'] . "</td>
            <td>" . $fila['nombre'] . "</td>
            <td>". "$ ". $fila['precio'] . "</td>
            <td>" . $fila['categoria'] . "</td>
            <td><img class='img-fluid card-img-100' onmouseover='bigImg(this)' onmouseout='normalImg(this)' src=".$fila['imagen']."></td>

        </tr>";
    }
    $salida .= "</tbody></</table></div>";
}else{
    $salida.="No hay datos :(";
}
echo $salida;
?>
<style>
    .my-custom-scrollbar {
        position: relative;
        height: 450px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        disp
</style>

<script>$(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });

        function bigImg(x) {
        x.style.height = "270px";
        x.style.width = "400px";
    }

        function normalImg(x) {
        x.style.height = "100px";
        x.style.width = "100px";
    }

</script>
