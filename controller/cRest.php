<?php

if (isset($_REQUEST['volver'])) { // si se ha pulsado el boton de Cerrar Sesion
    $_SESSION['controladorEnCurso'] = $controladores['inicio'];
    header("Location: index.php"); // redirige al login
    exit;
}

// API APOD
/**
 * @author susana
 * @since 1.0
 * @copyright 24-01-2021
 */
if (isset($_REQUEST['enviarAPOD'])) { //si se ha enviado una fecha
    //llamamos al servicio y le pasamos la fecha introducida por el usuario
    $aServicioAPOD = REST::sevicioAPOD($_REQUEST['fecha']);
} else {
    //llamamos al servicio y le pasamos la fecha de hoy
    $aServicioAPOD = REST::sevicioAPOD(date('Y-m-d'));
}

$tituloEnCurso = $aServicioAPOD['title'];
$imagenEnCurso = $aServicioAPOD['url'];
$descripcionEnCurso = $aServicioAPOD['explanation'];

// API IPGEO

/**
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.0 19/01/2021 Creación de codigo y documentación
 * @version 1.0
 */

if (isset($_REQUEST['enviarIPGEOLOC'])) {//si se manda una dirección ip
    //llamaos al servicio y le pasamos la ip introducida
    $aServicioIPGEO = REST::servicioIPGEO('&ip=' . $_REQUEST['ip']);
} else { //en caso que no mandar una dirección ip automaticamente nos devolvera nustra dirección ip
    
    $aServicioIPGEO = REST::servicioIPGEO(null);
}

//almacenamos los atributos que nos devuelte el api para mostrarlo o trabjar con el
$ipGeoIp = $aServicioIPGEO['ip'];
$ipGeoContinentName = $aServicioIPGEO['continent_name'];
$ipGeoCountryName = $aServicioIPGEO['country_name'];
$ipGeoCity = $aServicioIPGEO['city'];
$ipGeoFlag = $aServicioIPGEO['country_flag'];
$ipGeoIsp = $aServicioIPGEO['isp'];

//cargamos las vistas
$vistaEnCurso = $vistas['rest']; // asignamos a la variable vistaEnCurso la vista del login
require_once $vistas['layout']; // cargamos el layout
