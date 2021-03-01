<?php
/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 26/02/2021 Creación de codigo
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

if (isset($_REQUEST["borrar"])) {// si se ha pulsado el boton de borrar departamento
    //enviamos los valores a la funcion bajaFisicaDepartamento
    $depBorrado = DepartamentoPDO::bajaFisicaDepartamento($_SESSION["codDepartamento"]);

    if ($depBorrado == true) {//El departmaento a sido borrado
        $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep']; //cambia el valor de $_SESSION['controladorEnCurso']
    }
    header("Location: index.php"); // redirige al mantenimiento de departamento
    exit;
}

$vistaEnCurso = $vistas['borrarDepartamento']; // asignamos a la variable vistaEnCurso la vista del borrarDepartamento
require_once $vistas['layout']; // cargamos el layout