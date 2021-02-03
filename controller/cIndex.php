<?php

/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 01/01/2021 Documentación, creación del nuevo inicio 'index'.
 * @version 1.0
 */


if (isset($_REQUEST['login'])) { //si el boton de regristo es accionado entrara
    $_SESSION['controladorEnCurso'] = $controladores['login']; // asignamos a la variable vistaEnCurso la vista del registro
    header('Location: index.php'); //enviamos al de vuelta al index
    exit;
}

if (isset($_REQUEST['registro'])) { //si el boton de regristo es accionado entrara
    $_SESSION['controladorEnCurso'] = $controladores['registro']; // asignamos a la variable vistaEnCurso la vista del registro
    header('Location: index.php'); //enviamos al de vuelta al index
    exit;
}

//creamos una variable de sesion para poder trabajar con los nuevos modulos del programa idea sacada de forma de sacar la posición para cargar el archivo css en cada vista, mejorado con la idea de susana
$vistaEnCurso = $vistas['index']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout
?>