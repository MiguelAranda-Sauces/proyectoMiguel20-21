<?php

/**
 * Class UsuarioPDO
 *
 * Clase que se va a utilizar para crear un objeto de la clase UsuarioPDO
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 19/01/2021 Adaptación del codigo y documentación
 * @version 1.1
 */
class UsuarioPDO {

    /**
     * funcion validarUsuario : Comprueba si el usuario ha insertado correctamente las credenciales insertadas
     * 
     * @param type $codUsuario el código de usuario que vamos a validar (siendo este usuario de loging).
     * @param type $password el password que vamos a validar
     * @return \Usuario $oUsuario siendo esta la variable donde almacenamos los valores de la instacia de Usuario 
     * Si las credenciales insertadas no existen devolvemos null.
     * Si las credenciales insertadas existen devolvemos los valores de objeto Usuario y ademas hacemos un update de la ultima fecha de conexión y el número de conexiones aumentandolo en 1
     */
    public static function validarUsuario($codUsuario, $password) {
        $oUsuario = null; //Inicializamos la variable oUsuario a null

        $consulta = "Select * from T01_Usuario where T01_CodUsuario=? and T01_Password=?"; // Realizamos la consulta
        $passwordEncriptado = hash("sha256", ($codUsuario . $password)); // Encriptamos la contraseÃ±a del usuario concatenandola con el codigo del usuario
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $passwordEncriptado]); // Ejecutamos la consulta

        if ($resultado->rowCount() > 0) {// Si la consulta devuelve algo, el usuario introducido es correcto
            $oUsuarioConsulta = $resultado->fetchObject(); // Almacenamos el objeto devualto por la consulta en la variable ousuarioConsulta
            //
            //Instanciamos un objeto Usuario con los campos del resultado de la consulta
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil);

            $consultaActualizarUlimatConexion = "Update T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
            DBPDO::ejecutaConsulta($consultaActualizarUlimatConexion, [time(), $codUsuario]); //Actualizamos la fecha y hora de la ultima conexion
        }
        return $oUsuario; // Devolvemos el objeto oUsuario instanciado
    }

    /**
     * funcion validarCodNoExiste : Comprueba si el usuario ha insertado existe dentro de la base de datos en caso positivo devuelve el mensaje de error
     * 
     * @param type $codUsuario el código de usuario que vamos a validar (siendo este usuario de loging).
     * @return string Si el usuario ya exisite devolvemos un mensaje de error esto se puede cambiar por un valor booleano.
     */
    public static function validarCodNoExiste($codUsuario) {
        $oUsuario = null; //Inicializamos la variable oUsuario a null
        $consulta = "SELECT T01_CodUsuario FROM T01_Usuario where T01_CodUsuario=?"; //Creamos la consulta mysql
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);

        if ($resultado->rowCount() > 0) {
            $oUsuario = "El usuario ya existe";
        }
        return $oUsuario;
    }

    /**
     * funcion altaUsuario: Añade un nuevo usuario a la base de datos con los atributos recibidos por el formulario
     * 
     * @param type $codUsuario valor pasado con el id del usuario para logear
     * @param type $desUsuario valor pasado con la descripción del usuario
     * @param type $password valor pasado con el password para que el usuario pueda logear
     * T01_FechaHoraUltimaConexion lo estableceremos a la fecha actual ya que se auto inciara la sesión del usuario al registrarse (en caso de que no se quiera eso cambiaremos el valor por null)
     * Numero de conexiones lo estableceremos en '1' ya que se auto inciara la sesión del usuario al registrarse (en caso de que no se quiera eso cambiaremos el valor por un 0)
     * @return \Usuario $oUsuario siendo esta la variable donde almacenamos los valores de la instacia de Usuario 
     * 
     * si se registra correctamente hara un autologin en nuestra aplicación y actualizaremos su fecha de login y número de conexiones
     */
    public static function altaUsuario($codUsuario, $desUsuario, $password) {
        $oUsuario = null;
        $consulta = "INSERT INTO T01_Usuario (T01_CodUsuario, T01_DescUsuario, T01_Password,T01_FechaHoraUltimaConexion,T01_NumConexiones) VALUES(?, ?, ?, ?, ?)";
        $passwordEncriptado = hash("sha256", ($codUsuario . $password)); // Encriptamos la contraseÃ±a del usuario concatenandola con el codigo del usuario
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario, $desUsuario, $passwordEncriptado, time(), '1']);

        if ($resultado->rowCount() > 0) {
            $consulta = "SELECT * FROM T01_Usuario where T01_CodUsuario=?"; //Creamos la consulta mysql
            $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);

            $oUsuarioConsulta = $resultado->fetchObject(); // Almacenamos el objeto devualto por la consulta en la variable ousuarioConsulta
            //Instanciamos un objeto Usuario con los campos del resultado de la consulta
            $oUsuario = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil);

            $consultaActualizarUlimatConexion = "Update T01_Usuario set T01_NumConexiones = T01_NumConexiones+1, T01_FechaHoraUltimaConexion=? where T01_CodUsuario=?";
            DBPDO::ejecutaConsulta($consultaActualizarUlimatConexion, [time(), $codUsuario]); //Actualizamos la fecha y hora de la ultima conexion
        }
        return $oUsuario;
    }

    /**
     * funcion modificarUsuario: Modificamos la descripcion del usuario 
     * 
     * @param type $codUsuario valor pasado con el id del usuario
     * @param type $desUsuario valor pasado con la descripción del usuario
     * @return \Usuario $oUsuario siendo esta la variable donde almacenamos los valores de la instacia de Usuario 
     */
    public static function modificarUsuario($codUsuario, $desUsuario) {
        $oUsuario = null;
        $consulta = "UPDATE T01_Usuario SET T01_DescUsuario= ? WHERE T01_CodUsuario=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$desUsuario, $codUsuario]);

        $consulta = "SELECT T01_DescUsuario FROM T01_Usuario where T01_CodUsuario=?"; //Creamos la consulta mysql
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);

        $oUsuarioConsulta = $resultado->fetchObject(); // Almacenamos el objeto devualto por la consulta en la variable ousuarioConsulta
        //Instanciamos un objeto Usuario con los campos del resultado de la consulta
        $oUsuario =  $oUsuarioConsulta->T01_DescUsuario;

        return $oUsuario;
    }

    /**
     * funcion borrarUsuario: borramos el usuario logeado
     * 
     * @param type $codUsuario valor pasado con el id del usuario
     */
    public static function borrarUsuario($codUsuario) {
        $consulta = "DELETE FROM T01_Usuario WHERE T01_CodUsuario=?";
        DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
    }

    public static function consultarUsuario($codUsuario) {
        $oUsuarioAhora = null;
        $consulta = "SELECT * FROM T01_Usuario where T01_CodUsuario=?"; //Creamos la consulta mysql
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codUsuario]);
        $oUsuarioConsulta = $resultado->fetchObject(); // Almacenamos el objeto devualto por la consulta en la variable oUsuarioConsulta
        $oUsuarioAhora = new Usuario($oUsuarioConsulta->T01_CodUsuario, $oUsuarioConsulta->T01_Password, $oUsuarioConsulta->T01_DescUsuario, $oUsuarioConsulta->T01_NumConexiones, $oUsuarioConsulta->T01_FechaHoraUltimaConexion, $oUsuarioConsulta->T01_Perfil);

        return $oUsuarioAhora;
    }

}
