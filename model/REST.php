<?php

/**
 * @author Susana Fabián Antón
 * @since 26/01/2021
 * @version 26/01/2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 27/01/2021 implementacion de la funcion servicioIPGEO.
 * @version 1.1
 */
class REST {

    /**
     * Llama al servicio API REST APOD(Astronomy Picture of the Day), que nos devuelve la imagen atronómica del
     * día e información relativa a esta.
     * 
     * @param type $fecha la fecha que le vamos a pasar al servicio para que busque una imagen.
     * @return type array que contiene información sobre la imagen astronómica del día. 
     */
    public static function sevicioAPOD($fecha) {
        //llamamos al servicio, pasándole la fecha al campo date, y decodificamos el json que nos devuelve
        return json_decode(file_get_contents("https://api.nasa.gov/planetary/apod?api_key=DEMO_KEY&date=$fecha"), true);
    }

    /**
     * Llama al servicio API REST apigeolocation, que nos devuelve la geolocalización de la ip enviada
     * 
     * @param type $ip la ip le pasaremos al servicio para buscar los datos
     * @return type array que contiene información sobre la dirección ip que le pasamos.
     */
    public static function servicioIPGEO($ip) {
        return json_decode(file_get_contents("https://api.ipgeolocation.io/ipgeo?apiKey=99bfa463b107481992f326219e68e2ae$ip&lang=es"), true);
    }

}
