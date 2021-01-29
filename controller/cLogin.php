<?php

/**
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 20/01/2021 Documentación, pequeñas correciones en la validación y agregación del boton 'registro'.
 * @version 1.1
 */
define("OBLIGATORIO", 1); //definimos e inicializamos la constante obligatorio a 1
define("MINIMO", 1); //definimos e inicializamos la constante minimo a 1
$entradaOK = true; //declaramos y inicializamos la variable  entradaOk, esta variable decidira si es correcta la entrada de datos de los campos

$aError = [//declaramos y inicializamos el array de los errores de los campos del formulario a null
    "CodUsuario" => null,
    "Password" => null
];

if (isset($_REQUEST['registro'])) { //si el boton de regristo es accionado entrara
    $_SESSION['controladorEnCurso'] = $controladores['registro']; // asignamos a la variable vistaEnCurso la vista del registro
    header('Location: index.php'); //enviamos al de vuelta al index
    exit;
}

if (isset($_REQUEST["login"])) { //si el boton de login es accionado entrara y haremos la siguientes validaciones
    $aError["usuario"] = validacionFormularios::comprobarAlfabetico($_REQUEST["usuario"], 15, MINIMO, OBLIGATORIO); //Validamos la entrada del formulario para el campo textfieldObligatorio siendo este alfabetico
    $aError['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 8, MINIMO, 1, OBLIGATORIO); //Validamos la entrada del formulario para el campo password siendo este alfabetico de tamaño max 8 minimo 1


    foreach ($aError as $errores => $value) { //Recorremos todos los campos del array $aError 
        if ($value != null) { //Si algun campo de $aError tiene un valor diferente null entonces entra
            $entradaOK = false; // asignamos el valor a false en caso de que entre
        }
    }
    if ($entradaOK != false) { //si no hay ningun error hasta este paso entonces enviaremos la cosulta a la base de datos, en caso contrario no nos interesa pasar valores errones y hacer la consulta
        //creamos el objeto PDO y lo almacenamos
        $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']); // validamos que el usuario introducido y la contraseña son correctos
        if (!isset($oUsuario)) {//si no devulve resultado devolvemos un error
            $aError['usuario'] = 'Error de credenciales';
        }
    }
    foreach ($aError as $errores => $value) { //Recorremos todos los campos del array $aError
        if ($value != null) { //Si algun campo de $aError tiene un valor diferente null entonces entra
            $entradaOK = false; // asignamos el valor a false en caso de que entre
        }
    }
} else { // si el usuario no le ha dado al boton de enviar
    $entradaOK = false; // le doy el valor false a $entradaOK
}

if ($entradaOK) { // si la entrada esta bien recojo los valores introducidos y hago su tratamiento
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = $oUsuario; // guarda en la session el objeto usuario
    $_SESSION['controladorEnCurso'] = $controladores['inicio']; // guarda en la session el controlador que deseamos usar
    header('Location: index.php'); //enviamos al de vuelta al index
    exit;
}

//creamos una variable de sesion para poder trabajar con los nuevos modulos del programa idea sacada de forma de sacar la posición para cargar el archivo css en cada vista, mejorado con la idea de susana
$vistaEnCurso = $vistas['login']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout
?>