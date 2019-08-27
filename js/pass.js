var check = function() {
    if (document.getElementById('usuario_password').value === document.getElementById('usuario_password2').value)
    {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Las contraseñas coinciden';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Las contraseñas no coinciden';
    }
}

var check_p = function() {
    if (document.getElementById('nueva_password').value === document.getElementById('nueva_password2').value)
    {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Las contraseñas coinciden';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Las contraseñas no coinciden';
    }
}


function mostrarPassword(){
    var cambio = document.getElementById("usuario_password");
    if(cambio.type === "password"){
        cambio.type = "text";
        $('.i').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.i').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}

function mostrarPassword2(){
    var cambio = document.getElementById("nueva_password");
    if(cambio.type === "password"){
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
}