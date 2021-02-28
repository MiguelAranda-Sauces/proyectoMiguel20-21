<?php

if (isset($_REQUEST['volver'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['controladorEnCurso'] = $controladores['inicio'];
    header("Location: index.php"); // redirige al index
    exit;
}

if (isset($_REQUEST['closeSession'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['add'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['controladorEnCurso'] = $controladores['altaDepartamento'];
    header("Location: index.php"); // redirige al index
    exit;
}

if (isset($_REQUEST['editar'])) {
    $_SESSION["codDepartamento"] = $_REQUEST['editar'];
}
if (isset($_REQUEST['ver'])) {
    $_SESSION["codDepartamento"] = $_REQUEST['ver'];
}
if (isset($_REQUEST['borrar'])) {
    $_SESSION["codDepartamento"] = $_REQUEST['borrar'];
    $_SESSION['controladorEnCurso'] = $controladores['borrarDepartamento'];
    header("Location: index.php"); // redirige al index
}
if (isset($_REQUEST['alta'])) {
    $_SESSION["codDepartamento"] = $_REQUEST['alta'];
}
if (isset($_REQUEST['baja'])) {
    $_SESSION["codDepartamento"] = $_REQUEST['baja'];
}




if (isset($_REQUEST['buscar'])) { // si se ha pulsado el boton de buscar
    $entradaOK = true; //declaramos y inicializamos la variable entradaObligatorioK, esta variable decidira si es correcta la entrada de datos del formulario

    $aError = [//declaramos y inicializamos el array de los errores de los campos del formulario a null
        "descripcion" => null
    ];

    $aDatosDepartamento = [//declaramos y inicializamos el array de los datos del usuario de los campos del formulario a null
        "descripcion" => null
    ];

    $aError["descripcion"] = validacionFormularios::comprobarAlfabetico($_REQUEST["descripDepartamento"], 255, 3, 1); //Validamos la entrada del formulario para el campo descripción

    foreach ($aError as $errores => $value) { //Recorremos todos los campos del array $aError
        if ($value != null) { //Si algun campo de $aError tiene un valor diferente null entonces entra
            $entradaOK = false; // asignamos el valor a false en caso de que entre
        }
    }
} else {
    $entradaOK = false;
}
if ($entradaOK) {
    $_SESSION["BusquedaDepartamentos"] = $_REQUEST["descripDepartamento"];
    $aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDescripcion($_REQUEST["descripDepartamento"]);
} else {
    $_SESSION["BusquedaDepartamentos"] = '';
    $aDepartamentos = DepartamentoPDO::buscaDepartamentosPorDescripcion('');
}
//cargamos las vistas

$vistaEnCurso = $vistas['mantenimientoDep']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout