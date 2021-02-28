<?php

class DepartamentoPDO {

    public static function buscaDepartamentosPorDescripcion($descDepartamento) {
        $aDepartamentos = [];
        $consulta = "SELECT * FROM Departamento WHERE DescDepartamento LIKE '%' ? '%'";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$descDepartamento]);

        if ($resultado->rowCount() > 0) {
            $posicion = 0;
            $datosDepartamento = $resultado->fetchObject();
            while ($datosDepartamento) {
                $aDepartamentos[$posicion] = new Departamento($datosDepartamento->CodDepartamento, $datosDepartamento->DescDepartamento, $datosDepartamento->VolumenNegocio, $datosDepartamento->FechaBaja);
                $posicion++;
                $datosDepartamento = $resultado->fetchObject();
            }
        }
        return $aDepartamentos;
    }

    public static function buscaDepartamentosPorCodigo($codDepartamento) {
        $existeDep = false;
        $consulta = "SELECT CodDepartamento FROM Departamento where CodDepartamento=?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codDepartamento]);

        if ($resultado->rowCount() > 0) {
            $existeDep = true;
        }
        return $existeDep;
    }

    public static function altaDepartamento($codDepartamento, $nombreDepartamento, $volumenNegocio) {
        $depInsetado = false;
        $consulta = "INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES(?, ?, ?)";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codDepartamento, $nombreDepartamento, $volumenNegocio]);

        if ($resultado->rowCount() > 0) {
            $depInsetado = true;
        }
        return $depInsetado;
    }

    public static function bajaFisicaDepartamento($codDepartamento) {
        $depBorrado = false;
        $consulta = "DELETE FROM Departamento WHERE CodDepartamento = ?";
        $resultado = DBPDO::ejecutaConsulta($consulta, [$codDepartamento]);

        if ($resultado->rowCount() > 0) {
            $depBorrado = true;
        }
        return $depBorrado;
    }

}
