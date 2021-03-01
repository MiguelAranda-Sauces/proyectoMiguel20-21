<?php
/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 25/02/2021 Creación de codigo
 * @version 1.1
 * @subce 1.1 01/03/2021 Documentación
 */

if (isset($_REQUEST['cancelar'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep'];//cambia el valor de $_SESSION['controladorEnCurso']
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['closeSession'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}

define("OBLIGATORIO", 1); //definimos e inicializamos la constante obligatorio a 1


$entradaOK = true; //declaramos y inicializamos la variable $entradaOK, esta variable decidira si es correcta la entrada de datos del formulario

$aFormulario = [//declaramos y inicializamos el array de los campos del formulario a null
    "codDep" => null,
    "nDep" => null,
    "vNegocio" => null,
    "fecha"=>null
];
$aError = [//declaramos y inicializamos el array de los errores de los campos del formulario a null
    "codDep" => null,
    "nDep" => null,
    "vNegocio" => null
];

if (isset($_REQUEST["addDep"])) {
    $aError["codDep"] = validacionFormularios::comprobarAlfabetico(strtoupper($_REQUEST["codDep"]), 3, 3, OBLIGATORIO); //Validamos la entrada del formulario para el campo textfieldObligatorio siendo este alfabetico

    if ($aError["codDep"] === '') {//entra si no da error en la validación del campo
        $existeDep = DepartamentoPDO::buscaDepartamentosPorCodigo($_REQUEST["codDep"]);//Buscamos en la base de datos si existe el codigo de departamento
        if ($existeDep == true) {//si devuelve true ya existe
            $aError["codDep"] = "Ya existe un departamento con esas iniciales"; //insertamos valor en el array de errores
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
    //asignamos los valores a las variables del array $aFormulario
    $aFormulario["codDep"] = strtoupper($_REQUEST["codDep"]);
    $aFormulario["nDep"] = $_REQUEST["nDep"];
    $aFormulario["vNegocio"] = $_REQUEST["vNegocio"];
    //generamos la fecha del dia actual y la parseamos a timeStamp
    $fecha = new DateTime();
    $aFormulario["fecha"]= $fecha->getTimestamp();
    //enviamos los valores a la funcion altaDepartamento
    $insertarDep = DepartamentoPDO::altaDepartamento($aFormulario["codDep"], $aFormulario["nDep"], $aFormulario["vNegocio"],$aFormulario["fecha"]);
    //si devuelve true todo salio bien
    if ($insertarDep == true) {
        $_SESSION['controladorEnCurso'] = $controladores['mantenimientoDep']; //cambia el valor de $_SESSION['controladorEnCurso']
    }
    header("Location: index.php"); // redirige al mantenimiento de departamento
    exit;
}

$vistaEnCurso = $vistas['altaDepartamento']; // asignamos a la variable vistaEnCurso la vista del altaDepartamento
require_once $vistas['layout']; // cargamos el layout