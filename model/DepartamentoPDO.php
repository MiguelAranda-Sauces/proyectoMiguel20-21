<?php

/**
 * Class DepartamentoPDO
 *
 * Clase que se va a utilizar para crear un objeto de la clase DepartamentoPDO
 * 
 * @author Miguel Angel Aranda Garcia
 * @since 1.0
 * @copyright 22/02/2021
 * @author version 1.1 Miguel Angel Aranda Garcia
 * @since 1.1 01/02/2021 Adaptación del codigo y documentación
 * @version 1.1
 */
class DepartamentoPDO {

    /**
     * funcion buscaDepartamentosPorDescripcion : Busca todos los departamentos si hay con la descripcion total o parcial de este
     * 
     * @param type $descDepartamento la descripción que vamos a validar.
     * @return departamentos $aDepartamentos siendo esta la variable(array multidimensional) donde almacenamos los valores de la instacia de departamentos 
     */
    public static function buscaDepartamentosPorDescripcion($descDepartamento) {
        $aDepartamentos = [];
        $consulta = "SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE '%' ? '%'";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$descDepartamento]);

        if ($resultado->rowCount() > 0) {
            $posicion = 0;
            $datosDepartamento = $resultado->fetchObject();
            while ($datosDepartamento) {
                $aDepartamentos[$posicion] = new Departamento($datosDepartamento->T02_CodDepartamento, $datosDepartamento->T02_DescDepartamento, $datosDepartamento->T02_VolumenNegocio, $datosDepartamento->T02_FechaCreacionDepartamento, $datosDepartamento->T02_FechaBajaDepartamento);
                $posicion++;
                $datosDepartamento = $resultado->fetchObject();
            }
        }
        return $aDepartamentos;
    }

    /**
     * funcion buscaDepartamentosPorCodigo : Busca coincidencia por el codigo de departamento
     * 
     * @param type $codDepartamento la codigo de departamento que vamos para validar.
     * @return true o false $existeDep si existe el departamento con ese codigo devuelve true, si no devuelve false
     */
    public static function buscaDepartamentosPorCodigo($codDepartamento) {
        $existeDep = false;
        $consulta = "SELECT T02_CodDepartamento FROM T02_Departamento where T02_CodDepartamento=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codDepartamento]);

        if ($resultado->rowCount() > 0) {
            $existeDep = true;
        }
        return $existeDep;
    }

    /**
     * funcion altaDepartamento : añade un nuevo departamento a la base de datos
     * 
     * @param type $codDepartamento la codigo de departamento que vamos a usar para añardir el nuevo departamento.
     * @param type $nombreDepartamento el nombre de departamento que vamos a usar para añardir el nuevo departamento.
     * @param type $volumenNegocio el volumen de negocio de departamento que vamos a usar para añardir el nuevo departamento.
     * @param type $fechaCreacion la fecha en timestamp que vamos a usar para añardir el nuevo departamento.
     * @return true o false $depInsetado si el departamento a sido correctamente devuelve true
     */
    public static function altaDepartamento($codDepartamento, $nombreDepartamento, $volumenNegocio, $fechaCreacion) {
        $depInsetado = false;
        $consulta = "INSERT INTO T02_Departamento (T02_CodDepartamento, T02_DescDepartamento, T02_VolumenNegocio,T02_FechaCreacionDepartamento) VALUES(?, ?, ?,?)";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codDepartamento, $nombreDepartamento, $volumenNegocio, $fechaCreacion]);

        if ($resultado->rowCount() > 0) {
            $depInsetado = true;
        }
        return $depInsetado;
    }

    /**
     * funcion bajaFisicaDepartamento : borra el departamento de la base de datos
     * 
     * @param type $codDepartamento la codigo de departamento que vamos para validar.
     * @return true o false $depBorrado si a sido borrado el departamento con ese codigo devuelve true, si no devuelve false
     */
    public static function bajaFisicaDepartamento($codDepartamento) {
        $depBorrado = false;
        $consulta = "DELETE FROM T02_Departamento WHERE T02_CodDepartamento = ?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codDepartamento]);

        if ($resultado->rowCount() > 0) {
            $depBorrado = true;
        }
        return $depBorrado;
    }

    /**
     * funcion bajaLogicaDepartamento : modifica la tupla de fechaBaja para dar de baja logica al departamento
     * 
     * @param type $fechaBaja la fecha en timestamp para modificar la tupla del departamento
     * @param type $codDepartamento la codigo de departamento que vamos para validar.
     * @return true o false $depBaja si el departamento a sido modificado correctamente devuelve true, si no devuelve false
     */
    public static function bajaLogicaDepartamento($fechaBaja, $codDepartamento) {
        $depBaja = false;
        $consulta = "UPDATE T02_Departamento SET T02_FechaBajaDepartamento =?  WHERE T02_CodDepartamento = ?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$fechaBaja, $codDepartamento]);

        if ($resultado->rowCount() > 0) {
            $depBaja = true;
        }
        return $depBaja;
    }

     /**
     * funcion altaLogicaDepartamento : modifica la tupla de fechaBaja a null para reabilitar el departamento
     * 
     * @param type $codDepartamento la codigo de departamento que vamos para validar.
     * @return true o false $depAlta si el departamento a sido modificado correctamente devuelve true, si no devuelve false
     */
    public static function altaLogicaDepartamento($codDepartamento) {
        $depAlta = false;
        $consulta = "UPDATE T02_Departamento SET T02_FechaBajaDepartamento =?  WHERE T02_CodDepartamento = ?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [null, $codDepartamento]);

        if ($resultado->rowCount() > 0) {
            $depAlta = true;
        }
        return $depAlta;
    }
    
    /**
     * funcion obtenerDatosDepartamento :obtine los datos del departamento atraves del codigo de departamento
     * 
     * @param type $codDepartamento la codigo de departamento que vamos para validar.
     * @return true o false $datosDep siendo esta la variable donde almacenamos los valores de la instacia del departamento obtenido
     */

    public static function obtenerDatosDepartamento($codDepartamento) {
        $datosDep = null;

        $consulta = "Select * FROM T02_Departamento where T02_CodDepartamento=?";
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta, [$codDepartamento]); // almacenamos en la variable $resultadoConsulta el departamento obtenidos en la consulta

        if ($resultadoConsulta->rowCount() > 0) {
            $departamento = $resultadoConsulta->fetchObject();
            // Instanciamos un objeto Departamento con los datos devueltos por la consulta
            $datosDep = new Departamento($departamento->T02_CodDepartamento, $departamento->T02_DescDepartamento, $departamento->T02_VolumenNegocio, $departamento->T02_FechaCreacionDepartamento, $departamento->T02_FechaBajaDepartamento);
        }

        return $datosDep;
    }

    /**
     * funcion altaLogicaDepartamento : modifica la tupla de fechaBaja a null para reabilitar el departamento
     * 
     * @param type $codDepartamento la codigo de departamento que vamos para validar.
     * @param type $nombreDepartamento el nombre del departamento que usaremos para modificar el departamento
     * @param type $volumenNegocio el volumen de negocio del departamento que usaremos para modificar el departamento
     * @return true o false $modDep si el departamento a sido modificado correctamente devuelve true, si no devuelve false
     */
    public static function modificaDepartamento($codDepartamento, $nombreDepartamento, $volumenNegocio) {
        $modDep = false;
        $consulta = "UPDATE T02_Departamento SET T02_DescDepartamento= ?,T02_VolumenNegocio =? WHERE T02_CodDepartamento = ?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$nombreDepartamento, $volumenNegocio, $codDepartamento]);

        if ($resultado->rowCount() > 0) {
            $modDep = true;
        }
        return $modDep;
    }

}
