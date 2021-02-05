<?php

/**
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 20/01/2021 Documentación, agregacion del controlador y vista de registro.
 * @version 1.1
 */
require_once "core/libreriaValidacion.php"; //importamos el archivo de libreria de validacion
//importortamos los modelos
require_once "model/Usuario.php";
require_once "model/UsuarioPDO.php";
require_once "model/DBPDO.php";
require_once "model/REST.php";


//creamos el objeto controladores y le asignamos las rutas
$controladores = [
    "index" => "controller/cIndex.php",
    "login" => "controller/cLogin.php",
    "inicio" => "controller/cInicio.php",
    "registro" => "controller/cRegistro.php",
    "editar" => "controller/cEditar.php",
    "rest" => "controller/cRest.php",
    "borrarCuenta" => "controller/cBorrarCuenta.php"
];

//creamos el objeto vistas y le asignamos las rutas
$vistas = [
    "index" => "view/vIndex.php",
    "layout" => "view/layout.php",
    "login" => "view/vLogin.php",
    "inicio" => "view/vInicio.php",
    "registro" => "view/vRegistro.php",
    "editar" => "view/vEditar.php",
    "rest" => "view/vRest.php",
    "borrarCuenta" => "view/vBorrarCuenta.php"
];
?>
