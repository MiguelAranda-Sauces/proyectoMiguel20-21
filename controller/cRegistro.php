<?php

/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 19/01/2021 Creación de codigo y documentación
 * @version 1.0
 */

if(isset($_REQUEST['login'])){
    $_SESSION['controladorEnCurso'] = $controladores['login'];
    header('Location: index.php'); // redirige al login
    exit;
}

if(isset($_REQUEST['cancelar'])){
    $_SESSION['controladorEnCurso'] = $controladores['index'];
    header('Location: index.php'); // redirige al login
    exit;
}

define("OBLIGATORIO", 1); //definimos e inicializamos la constante obligatorio a 1
define("MINIMO", 1); //definimos e inicializamos la constante minimo a 1
$entradaOK = true; //declaramos y inicializamos la variable entradaObligatorioK, esta variable decidira si es correcta la entrada de datos del formulario

$aError = [//declaramos y inicializamos el array de los errores de los campos del formulario a null
    "usuario" => null,
    "descripcion" => null,
    "password" => null,
    "passwordComprobacion" => null
];

$aDatosUsuario = [//declaramos y inicializamos el array de los datos del usuario de los campos del formulario a null
    "usuario" => null,
    "descripcion" => null,
    "password" => null
];

if (isset($_REQUEST["addUser"])) {
    $aError["usuario"] = validacionFormularios::comprobarAlfabetico($_REQUEST["usuario"], 15, MINIMO, OBLIGATORIO); //Validamos la entrada del formulario para el campo textfieldObligatorio siendo este alfabetico

    if (($aError["usuario"] == null)) {
        $oUsuario = UsuarioPDO::validarCodNoExiste($_REQUEST['usuario']); // validamos que el usuario introducido y la contraseña son correctos
        $aError['usuario'] = $oUsuario;
    }
    
    $aError["descripcion"] = validacionFormularios::comprobarAlfabetico($_REQUEST["descripcion"], 255, MINIMO, OBLIGATORIO); //Validamos la entrada del formulario para el campo textfieldObligatorio siendo este alfabetico
    $aError['password'] = validacionFormularios::validarPassword($_REQUEST['password'], 8, MINIMO, 1, OBLIGATORIO); //Validamos la entrada del formulario para el campo password siendo este alfabetico de tamaño max 8 minimo 1
    $aError['passwordComprobacion'] = validacionFormularios::validarPassword($_REQUEST['passwordComprobacion'], 8, MINIMO, 1, OBLIGATORIO); //Validamos la entrada del formulario para el campo password siendo este alfabetico de tamaño max 8 minimo 1

    if ($aError['password'] == null && $aError['passwordComprobacion'] == null) {
        if ($_REQUEST['password'] != $_REQUEST['passwordComprobacion']) {
            $aError['passwordComprobacion'] = "Las Password no coinciden";
        }
    }

    foreach ($aError as $errores => $value) { //Recorremos todos los campos del array $aError
        if ($value != null) { //Si algun campo de $aError tiene un valor diferente null entonces entra
            $entradaOK = false; // asignamos el valor a false en caso de que entre
        }
    }
} else {//si el usuario no ha pulsado el boton de enviar
    $entradaOK = false; //asignamos el valor a false ya que no se a enviado nada.
}

if ($entradaOK) {// si el valor es true entra
    $aDatosUsuario['usuario'] = $_REQUEST['usuario'];
    $aDatosUsuario['descripcion'] = $_REQUEST["descripcion"];
    $aDatosUsuario['password'] = $_REQUEST['password'];

    $oUsuario = UsuarioPDO::altaUsuario( $aDatosUsuario['usuario'], $aDatosUsuario['descripcion'], $aDatosUsuario['password']); //llamamos a la funcion alta usuario de la case UsuarioPDO y le pasaremos los valores de $usuario,$descripción y $password
    $_SESSION['usuarioDAW210AplicacionFinal'] = $oUsuario; // guarda en la session el objeto usuario
    $_SESSION['controladorEnCurso'] = $controladores['inicio']; // guarda en la session el controlador que deseamos usar
    header('Location: index.php'); //enviamos al de vuelta al index
    exit;
}

$vistaEnCurso = $vistas['registro']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout
?>