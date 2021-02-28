<?php

if (isset($_REQUEST['cancelar'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep'];
    header("Location: index.php"); // redirige al mantenimiento de departamento
    exit;
}

if (isset($_REQUEST['closeSession'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST["borrar"])) {
    $depBorrado = DepartamentoPDO::bajaFisicaDepartamento($_SESSION["codDepartamento"]);

    if ($depBorrado == true) {//El departmaento a sido borrado
        $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep'];
    }
    header("Location: index.php"); // redirige al mantenimiento de departamento
    exit;
}

$vistaEnCurso = $vistas['borrarDepartamento']; // asignamos a la variable vistaEnCurso la vista del bajaDepartamento
require_once $vistas['layout']; // cargamos el layout