<?php

class SentenciaController {
    private $modelo;

    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    public function ejecutarConsulta($consulta) {
        try {
            $resultado = $this->modelo->ejecutarConsulta($consulta);
            return $resultado;
        } catch (Exception $e) {
            // Aquí podrías manejar el error de alguna manera apropiada, como registrarlo o lanzar una excepción personalizada
            return null;
        }
    }

    public function insertarDbo($consulta) {
        try {
            $resultado = $this->modelo->insertarDbo($consulta);
            return $resultado;
        } catch (Exception $e) {
            // Manejo de errores
            return false;
        }
    }
}
?>