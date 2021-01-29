<?php

/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 25/01/2021 Creación de codigo y documentación
 * @version 1.0
 */

if (isset($_REQUEST['back'])) { // si se ha pulsado el boton de back
    $_SESSION['controladorEnCurso'] = $controladores['inicio']; // guarda en la session el controlador que deseamos usar
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST["borrar"])) {

    $oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];
    $codUsuario = $oUsuarioActual->getCodUsuario(); // variable que tiene el código del usuario sacado de la base de datos

    
    $oUsuario = UsuarioPDO::borrarUsuario($codUsuario); //llamamos a la funcion alta usuario de la case UsuarioPDO y le pasaremos los valores de $usuario,$descripción y $password
    session_destroy(); // destruye todos los datos asociados a la sesion
    header('Location: index.php'); //enviamos al de vuelta al index
    exit;
}

$vistaEnCurso = $vistas['borrarCuenta']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout
