<?php

if (isset($_REQUEST['cancelar'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep'];
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['closeSession'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}

define("OBLIGATORIO", 1); //definimos e inicializamos la constante obligatorio a 1
//cargamos las vistas
$entradaOK = true; //declaramos y inicializamos la variable entradaObligatorioK, esta variable decidira si es correcta la entrada de datos del formulario

$aFormulario = [//declaramos y inicializamos el array de los campos del formulario a null
    "codDep" => null,
    "nDep" => null,
    "vNegocio" => null
];
$aError = [//declaramos y inicializamos el array de los errores de los campos del formulario a null
    "codDep" => null,
    "nDep" => null,
    "vNegocio" => null
];

if (isset($_REQUEST["addDep"])) {
    $aError["codDep"] = validacionFormularios::comprobarAlfabetico(strtoupper($_REQUEST["codDep"]), 3, 3, OBLIGATORIO); //Validamos la entrada del formulario para el campo textfieldObligatorio siendo este alfabetico

    if ($aError["codDep"] === '') {//entra si no da error en la validación del campo
        $existeDep = DepartamentoPDO::buscaDepartamentosPorCodigo($_REQUEST["codDep"]);
        if ($existeDep == true) {//si devuelve true ya existe
            $aError["codDep"] = "Ya existe un departamento con esas iniciales";
        }
    }
    $aError["nDep"] = validacionFormularios::comprobarAlfabetico($_REQUEST["nDep"], 50, 3, OBLIGATORIO); //Validamos la entrada del formulario para el campo nDep siendo este alfabetico de tamaño max 50 minimo 3
    $aError["vNegocio"] = validacionFormularios::comprobarEntero($_REQUEST["vNegocio"], 20, 1, 1); //Validamos la entrada del formulario para el campo vNegocio siendo este numerico siendo este de tamaño max 20, minimo 1 y opcional

    foreach ($aError as $errores => $value) { //Recorremos todos los campos del array $aError
        if ($value != null) { //Si algun campo de $aError tiene un valor diferente null entonces entra
            $entradaOK = false; // asignamos el valor a false en caso de que entre
        }
    }
} else {//si el usuario no ha pulsado el boton de enviar
    $entradaOK = false; //asignamos el valor a false ya que no se a enviado nada.
}
if ($entradaOK) {// si el valor es true entra
    $aFormulario["codDep"] = strtoupper($_REQUEST["codDep"]);
    $aFormulario["nDep"] = $_REQUEST["nDep"];
    $aFormulario["vNegocio"] = $_REQUEST["vNegocio"];
    $insertarDep = DepartamentoPDO::altaDepartamento($aFormulario["codDep"], $aFormulario["nDep"], $aFormulario["vNegocio"]);
    if ($insertarDep == true) {
        $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep'];
    }
    header("Location: index.php"); // redirige al mantenimiento de departamento
    exit;
}

$vistaEnCurso = $vistas['altaDepartamento']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout