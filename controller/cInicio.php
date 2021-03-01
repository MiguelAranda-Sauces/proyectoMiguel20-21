<?php

/**
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 20/01/2021 Documentación.
 * @version 1.1
 */
if (!isset($_SESSION['usuarioDAW210AplicacionFinal'])) { // si no se ha logueado le usuario
    header('Location: index.php'); // redirige al login
    exit;
}

if (isset($_REQUEST['closeSession'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['editar'])) { // si se ha pulsado el boton de editar
    $_SESSION['controladorEnCurso'] = $controladores['editar']; //cambia el valor de $_SESSION['controladorEnCurso']
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['rest'])) { // si se ha pulsado el boton de rest
    $_SESSION['controladorEnCurso'] = $controladores['rest']; //cambia el valor de $_SESSION['controladorEnCurso']
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['mantenimientoDep'])) { // si se ha pulsado el boton de mantenimiento Departamento
    $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep']; //cambia el valor de $_SESSION['controladorEnCurso']
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['borrarCuenta'])) { // si se ha pulsado el boton de borrar Cuenta
    $_SESSION['controladorEnCurso'] = $controladores['borrarCuenta']; //cambia el valor de $_SESSION['controladorEnCurso']
    header("Location: index.php"); // redirige al login
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW210AplicacionFinal'];
$numAccesos = $oUsuarioActual->getNumAccesos(); // variable que tiene el numero de conexiones sacado de la base de datos
$descUsuario = $oUsuarioActual->getDescUsuario(); // variable que tiene la descripcion del usuario sacado de la base de datos
$ultimaConexion = $_SESSION['fechaHoraUltimaConexion']; // variable que tiene la fecha y hora de la ultima conexion

$vistaEnCurso = $vistas['inicio']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout
?>