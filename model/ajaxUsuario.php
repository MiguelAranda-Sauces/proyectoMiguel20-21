<?php

require_once "../config/configDB.php";

$usuario = $_POST['usuario'];
if ($usuario != null) {
    try {
        $miDB = new PDO(DNS, USER, PASSWORD); //iniciamos la session con la bd
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //asignamos los atributos de la clase PDO
        $sql = "SELECT T01_CodUsuario FROM T01_Usuario where T01_CodUsuario=:codUsuario"; //Creamos la consulta mysql con los parametros bind

        $consultaUsuario = $miDB->prepare($sql); //Preparamos la consulta
        $consultaUsuario->bindParam("codUsuario", $usuario); //Declaramos el parametro bind
        $consultaUsuario->execute(); //Ejecutamos la consulta preparada                           
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

    if ($consultaUsuario->rowCount() > 0) {
        $oUsuario = "El usuario ya existe";
        echo $oUsuario;
    }
    
}