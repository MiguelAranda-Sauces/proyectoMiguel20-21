<?php

/**
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 19/01/2021 Adaptación del codigo
 * @version 1.1
 */

require_once 'config/config.php'; // para poder cargar la vista tenemos que importar el archivo de config
require_once 'config/configDB.php'; // para dar acceso a la base de datos importamos la configuración a dicha

session_start(); //iniciamos la sesión
//si la session esta iniciada entonces cargara inicio si no, cargara la vista que necesitamos en ese momento que el controlador esta almacenado en la variable de sesion

if (isset($_SESSION['controladorEnCurso'])) {//si la sesión esta iniciada, cargamos el controlador pasado
    require_once $_SESSION['controladorEnCurso'];
} else { //si no esta iniciada la sesión el controlador tendra el valor de login
    require_once $controladores["login"];
}
?>