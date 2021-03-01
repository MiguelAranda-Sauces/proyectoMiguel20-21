<?php

/**
 * Class Departamentos
 *
 * Clase que se va a utilizar para crear un objeto de la clase Usuario
 * 
 * @author version 1.0 Miguel Angel Aranda Garcia
 * @since 1.1 
 * @copyright 26-02-2021
 * @version 1.1 modificacion geter y seter version susana
 */
class Departamento {

    // definimos los atributo de la clase
    private $codDepartamento;
    private $descDepartamento;
    private $volumenDeNegocio;
    private $fechaCreacionDepartamento;
    private $fechaBajaDepartamento;

    /**
     * Instancia un objeto de la clase Departamento
     * 
     * @param type $codDepartamento el código del departamento
     * @param type $descDepartamento la descripción del departamento
     * @param type $volumenDeNegocio el volumen de negocio del departamento
     * @param type $fechaCreacionDepartamento la fecha de creación del departamento
     * @param type $fechaBajaDepartamento la fecha de baja logica del departamento
     */
    function __construct($codDepartamento, $descDepartamento, $volumenDeNegocio, $fechaCreacionDepartamento, $fechaBajaDepartamento) {
        $this->codDepartamento = $codDepartamento;
        $this->descDepartamento = $descDepartamento;
        $this->volumenDeNegocio = $volumenDeNegocio;
        $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        $this->fechaBajaDepartamento = $fechaBajaDepartamento;
    }

    /**
     * Devuelve el valor de un atributo
     * 
     * @param type $atributo el atributo cuyo valor deseamos conocer
     * @return type el valor del atributo
     */
    public function __get($atributo) {
        return $this->$atributo;
    }

    /**
     * Cambia el valor de un atributo
     * 
     * @param type $atributo el atributo cuyo valor deseamos cambiar
     * @param type $valor el valor que queremos darle al atributo
     */
    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }

}
