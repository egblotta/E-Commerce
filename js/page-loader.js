$(document).ready(function() {
    $('.button').on('click', function(){
        //Añadimos la imagen de carga en el contenedor
        $('#content').html('<div class="loading"><img src="Images/page-loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');

        $.ajax({
            type: "POST",
            url: "main-page.php",
            success: function(data) {
                //Cargamos finalmente el contenido deseado
                $('#content').fadeIn(1000).html(data);
            }
        });
        return false;
    });
});