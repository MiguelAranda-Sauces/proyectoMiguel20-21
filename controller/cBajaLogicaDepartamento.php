<?php

/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 25/02/2021 Creación de codigo
 * @version 1.1
 * @subce 1.1 01/03/2021 Documentación
 */
if (isset($_REQUEST['cancelar'])) { // si se ha pulsado el boton de cancelar
    $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep']; //cambia el valor de $_SESSION['controladorEnCurso']
    header("Location: index.php"); // redirige al mantenimiento de departamento
    exit;
}

if (isset($_REQUEST['closeSession'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST["baja"])) {// si se ha pulsado el boton de Baja departamento
    //generamos la fecha del dia actual y la parseamos a timeStamp
    $fecha = new DateTime();
    $fechaBaja = $fecha->getTimestamp();
    //enviamos los valores a la funcion bajaLogicaDepartamento
    $bajaDep = DepartamentoPDO::bajaLogicaDepartamento($fechaBaja, $_SESSION["codDepartamento"]);
    if ($bajaDep == true) {//El departmaento a sido dado de baja
        $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep']; //cambia el valor de $_SESSION['controladorEnCurso']
    }
    header("Location: index.php"); // redirige al mantenimiento de departamento
    exit;
}

$vistaEnCurso = $vistas['bajaLogicaDepartamento']; // asignamos a la variable vistaEnCurso la vista del bajaLogicaDepartamento
require_once $vistas['layout']; // cargamos el layout