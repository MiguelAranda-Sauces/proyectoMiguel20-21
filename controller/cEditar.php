
<?php

/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 22/01/2021 Creación de codigo y documentación
 * @version 1.0
 */
if (isset($_REQUEST['back'])) { // si se ha pulsado el boton de back
    $_SESSION['controladorEnCurso'] = $controladores['inicio']; // guarda en la session el controlador que deseamos usar
    header("Location: index.php"); // redirige al login
    exit;
}

if (isset($_REQUEST['cambioPass'])) { // si se ha pulsado el boton de cambioPass
    $_SESSION['controladorEnCurso'] = $controladores['cambioPass']; // guarda en la session el controlador que deseamos usar
    header("Location: index.php"); // redirige al login
    exit;
}



$entradaOK = true; //declaramos y inicializamos la variable entradaObligatorioK, esta variable decidira si es correcta la entrada de datos del formulario

$aError = [//declaramos y inicializamos el array de los errores de los campos del formulario a null
    "descripcion" => null
];

$aDatosUsuario = [//declaramos y inicializamos el array de los datos del usuario de los campos del formulario a null
    "usuario" => null,
    "descripcion" => null
];
if (isset($_REQUEST["edit"])) {

    $aError["descripcion"] = validacionFormularios::comprobarAlfabetico($_REQUEST["descripcion"], 255, 3, 1); //Validamos la entrada del formulario para el campo descripción

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

    $oUsuario = UsuarioPDO::modificarUsuario($aDatosUsuario['usuario'], $aDatosUsuario['descripcion']); //llamamos a la funcion alta usuario de la case UsuarioPDO y le pasaremos los valores de $usuario,$descripción y $password
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = $oUsuario; // guarda en la session el objeto usuario
    $_SESSION['controladorEnCurso'] = $controladores['inicio']; // guarda en la session el controlador que deseamos usar
    header('Location: index.php'); //enviamos al de vuelta al index
    exit;
}
//  creamos la variable $oUsuarioActual y le pasamos los valores del usuario logeado
$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];
$codUsuario = $oUsuarioActual->getCodUsuario(); // variable que tiene el código del usuario sacado de la base de datos
$numAccesos = $oUsuarioActual->getNumAccesos(); // variable que tiene el numero de conexiones sacado de la base de datos
$descUsuario = $oUsuarioActual->getDescUsuario(); // variable que tiene la descripcion del usuario sacado de la base de datos
$ultimaConexion = $oUsuarioActual->getFechaHoraUltimaConexion(); // variable que tiene la fecha y hora de la ultima conexion

$vistaEnCurso = $vistas['editar']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout
?>