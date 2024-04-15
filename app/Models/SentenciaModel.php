<?php

class SentenciaModelo {
    private $conexion;
    private $sentencia;
    private $resultado;
    private $consulta;
    private $tabla;

    public function __construct($consulta, $conexion, $sentencia, $resultado, $tabla) {
        $this->consulta = $consulta;
        $this->conexion = $conexion;
        $this->sentencia = $sentencia;
        $this->resultado = $resultado;
        $this->tabla = $tabla;
    }

    public function ejecutarConsulta($consulta) {
        try {
            $sentencia = $this->conexion->prepare($consulta);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        } catch (PDOException $e) {
            // Aquí podrías manejar el error de alguna manera apropiada, como registrarlo o lanzar una excepción personalizada
            return null;
        }
    }

    public function insertarDbo($consulta) {
        try {
            $sentencia = $this->conexion->prepare($consulta);
            $sentencia->execute();
            return true;
        } catch (PDOException $e) {
            // Manejo de errores
            return false;
        }
    }
}

?>