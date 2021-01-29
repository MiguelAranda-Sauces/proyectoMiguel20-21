<?php

/**
 * Class DBPDO
 *
 * Clase que se va a utilizar para crear un objeto de la clase DBPDO
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 20/01/2021 Documentación
 * @version 1.1
 */
class DBPDO {

    /**
     * funcion ejecutarConsulta usada para lanzar todas las consultas necesitas contra la base de datos de forma instanciada y segura
     * 
     * @param type $sentenciaSQL consulta SQL pasada como parametro para realizar la consulta
     * @param type $parametros valores pasados como parametros necesarios para poder realizar correctametne la consulta
     * @return type $consulta devolveremos el resultado de la consulta como un objeto PDO
     */
    public static function ejecutaConsulta($sentenciaSQL, $parametros) {
        try {
            $miDB = new PDO(DNS, USER, PASSWORD); //iniciamos la session con la bd
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //asignamos los atributos de la clase PDO
            $consulta = $miDB->prepare($sentenciaSQL); //preparamos la consulta pasada a la función
            $consulta->execute($parametros); //ejecutamos la consulta
        } catch (PDOException $miExcepcionPDO) {
            echo "<div class = 'contenedorError'>";
            echo "<div class = 'box'>";
            echo "<p class = 'error'>Error " . $miExcepcionPDO->getMessage() . "</p>";
            echo "<p class = 'error'>Cod.Error " . $miExcepcionPDO->getCode() . "</p>";
            echo "<h2 class = 'error'>Error en la conexión con la base de datos</h2>";
            echo "</div>";
            $consulta = null; //destruimos la consulta
            unset($miDB); //cerramos la conxion con la base de datos
        }
        //en caso de que todo sea correcto hace el return del resultado de la consulta
        return $consulta;
    }

}
