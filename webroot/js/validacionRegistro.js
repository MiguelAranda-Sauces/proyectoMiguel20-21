window.onload = function () {
    validarConEventos();
};

/*Array de campos*/

var error = new Array();
error['usuario'] = false;
error['descripcion'] = false;
error['password'] = false;
error['password2'] = false;

//validaciones

function validarVacio(idCampo, idError) {
    var vImput = document.getElementById(idCampo).value;
    if (vImput.length === 0 || /^\s+$/.test(vImput)) {
        document.getElementById(idError).innerHTML = 'Campo vacío.';
        styleError(idCampo, idError);
        vacio = true;
    } else {
        vacio = false;
    }
    return vacio;
}

function validarMin(idCampo, idError, cantidad) {
    var min = false;
    var vImput = document.getElementById(idCampo).value;
    if (vImput.length < cantidad) {
        document.getElementById(idError).innerHTML = 'Debe contener almenos de ' + cantidad + ' caracteres.';
        styleError(idCampo, idError);
        document.getElementById(idError).style.fontSize = '0.5rem';
        min = true;
    }
    return min;
}

function validarMax(idCampo, idError, cantidad) {
    var max = false;
    var vImput = document.getElementById(idCampo).value;
    if (vImput.length > cantidad) {
        document.getElementById(idError).innerHTML = '<br>Debe contener menos de ' + cantidad + ' caracteres.';
        styleError(idCampo, idError);
        document.getElementById(idError).style.fontSize = '0.5rem';
        max = true;
    }
    return max;
}

function validarString(idCampo, idError) {
    var cString = false;
    var vImput = document.getElementById(idCampo).value;
    if (/[0-9]{1}/.test(vImput)) {
        document.getElementById(idError).innerHTML = 'No puede contener números.';
        styleError(idCampo, idError);
        cString = true;
    }
    return cString;
}

function styleError(idCampo, idError) {
    document.getElementById(idCampo).style.borderColor = 'red';
    document.getElementById(idError).style.color = 'red';
    document.getElementById(idError).style.fontSize = '20px';
}

function styleDefault(idCampo, idError) {
    document.getElementById(idError).innerHTML = '';
    document.getElementById(idCampo).style.borderColor = '#000';
    document.getElementById(idError).style.color = '#000';
    document.getElementById(idError).style.fontSize = '20px';

}

/*ajax*/
/*mostrar valor de la base datos*/

function comprobarDisponibilidad() {
    var usuario = $('#usuario').val();
    console.log(usuario);
    jQuery.ajax({
        url: "api/ajaxUsuario.php",
        data: 'usuario=' + $("#usuario").val(),
        type: "POST",
        success: function (data) {
            console.log(data);
            if (data !== '') {
                $("#erUsuario").html(data);
                error['usuario'] = true;
                styleError('usuario', "erUsuario");
            }
        },
        error: function () {
            $("#erUsuario").html('Servicio no disponible');
        }
    });

}
//general

function validarConEventos() {

    /*Usuario*/

    var usuario = document.getElementById('usuario');
    usuario.addEventListener('blur', function () {
        if (validarVacio('usuario', 'erUsuario') === true) {
            error['usuario'] = true;
        } else if (validarMin('usuario', 'erUsuario', 3) === true) {
            error['usuario'] = true;
        } else if (validarMax('usuario', 'erUsuario', 15) === true) {
            error['usuario'] = true;
        } else if (validarString('usuario', 'erUsuario') === true) {
            error['usuario'] = true;
        } else {
            error['usuario'] = false;
            styleDefault('usuario', 'erUsuario')
            comprobarDisponibilidad();
        }
        comprobarDisponibilidad();
    });

    /*Descripción*/

    var descripcion = document.getElementById('descripcion');
    descripcion.addEventListener('blur', function () {
        if (validarVacio('descripcion', 'erDescripcion') === true) {
            error['descripcion'] = true;
        } else if (validarMin('descripcion', 'erDescripcion', 3) === true) {
            error['descripcion'] = true;
        } else if (validarMax('descripcion', 'erDescripcion', 255) === true) {
            error['descripcion'] = true;
        } else {
            error['descripcion'] = false;
            styleDefault('descripcion', 'erDescripcion');
        }
    });

    /*Password 1*/

    var password = document.getElementById('password');
    password.addEventListener('blur', function () {
        if (validarVacio('password', 'erPassword') === true) {
            error['password'] = true;
        } else if (validarMin('password', 'erPassword', 3) === true) {
            error['password'] = true;
        } else if (validarMax('password', 'erPassword', 8) === true) {
            error['password'] = true;
        } else if (validarString('password', 'erPassword')) {
            error['password'] = true;
        } else {
            error['password'] = false;
            styleDefault('password', 'erPassword');
        }
    });

    /*Password 2*/

    var password2 = document.getElementById('password2');
    password2.addEventListener('blur', function () {
        if (validarVacio('password2', 'erPassword2') === true) {
            error['password2'] = true;
        } else if (validarMin('password2', 'erPassword2', 3) === true) {
            error['password2'] = true;
        } else if (validarMax('password2', 'erPassword2', 8) === true) {
            error['password2'] = true;
        } else if (validarString('password2', 'erPassword2')) {
            error['password2'] = true;
        }else if(password.value !== password2.value){
             error['password2'] = true;
             document.getElementById('erPassword2').innerHTML = 'Los password no son iguales';
              styleError('password2', "erPassword2");
        } else {
            error['password2'] = false;
            styleDefault('password2', 'erPassword2');
        }
    });
}
