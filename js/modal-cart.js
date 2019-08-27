$('.openMod').on('click',function(){
    $('.modal-body').load('cart-add.php', function(){
        $('#modalCart').modal({show:true});
    });
});