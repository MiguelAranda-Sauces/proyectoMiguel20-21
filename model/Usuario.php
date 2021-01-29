<?php

/**
 * Class Usuario
 *
 * Clase que se va a utilizar para crear un objeto de la clase Usuario
 * 
 * @author Cristina Nuñez y Javier Nieto
 * @since 1.0
 * @copyright 16-01-2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 19/01/2021 Adaptación del codigo y documentación
 * @version 1.1
 */
class Usuario {

    // definimos los atributo de la clase
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAccesos;
    private $fechaHoraUltimaConexion;
    private $perfil;
   

    /**
     * Instaciamos el objeto de clase Usuario
     * 
     * @param type $codUsuario es el código  del usuario
     * @param type $password es la password del usuario
     * @param type $descUsuario es la descripción del usuario
     * @param type $numAccesos es la cantidad de veces que a acedido a la aplicación
     * @param type $fechaHoraUltimaConexion es la fecha del ultimo incicio de sesión con su cuenta
     * @param type $perfil es el tipo de perfil del usuario (normal, administrador)
     */
    function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAccesos = $numAccesos;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->perfil = $perfil;
    }

    /**
     * Devuelve el valor de los atributos
     * 
     * @param type get metodo para devolver los atributos
     * @return type Devolvera el valor de cada uno de los atributos
     */

    function getCodUsuario() {
        return $this->codUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getDescUsuario() {
        return $this->descUsuario;
    }

    function getNumAccesos() {
        return $this->numAccesos;
    }

    function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    function getPerfil() {
        return $this->perfil;
    }

    
     /**
     * Cambia el valor de los atributos
     * 
     * @param type set metodo para asignar valores 
     * @return type Asigna el valor de cada uno de los atributos
     */

    function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setDescUsuario($descUsuario) {
        $this->descUsuario = $descUsuario;
    }

    function setNumAccesos($numAccesos) {
        $this->numAccesos = $numAccesos;
    }

    function setFechaHoraUltimaConexion($fechaHoraUltimaConexion) {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    function setPerfil($perfil) {
        $this->perfil = $perfil;
    }
}
