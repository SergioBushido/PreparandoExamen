<?php
class Jugador {
    private $conexion;

    public function __construct() {
        $this->conexion = (new Conexion())->getConexion();
    }

    public function validarDorsal($dorsal) {
        // Implementa la lógica para validar si el dorsal ya existe en la base de datos
    }

    public function validarBarcode($barcode) {
        // Implementa la lógica para validar si el código de barras ya existe en la base de datos
    }

    public function insertarJugador($nombre, $apellidos, $dorsal, $posicion, $barcode) {
        // Implementa la lógica para insertar un nuevo jugador en la base de datos
    }

    public function obtenerJugadores() {
        // Implementa la lógica para obtener todos los jugadores de la base de datos
    }
}
