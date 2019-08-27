function vaciar(id) {
    $.ajax({
        url: 'cart.php?vaciar='+id,     //paso al cart.php el codigo recibido
        type:'POST',
        dataType:'html',
        data: {consulta: id},
    })
        .done(function (respuesta) {
            $("#cart").html(respuesta);
            $('.modal-body').load('cart-add.php', function(){
                $('#modalCart').modal({show:true});
            });
        })
        .fail(function () {
            console.log("El carrito no se pudo vaciar");
        });
};
