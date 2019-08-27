function agregar(id) {
    $.ajax({
        url: 'cart.php?codigo='+id,     //paso al cart.php el codigo recibido
        type:'POST',
        dataType:'html',
        data: {consulta: id},   //informacion que le paso al servidor
    })
        .done(function (respuesta) {
            $("#cart").html(respuesta);
            alert('Agregado al carrito')
        })
        .fail(function () {
            console.log("error");
        });
};
