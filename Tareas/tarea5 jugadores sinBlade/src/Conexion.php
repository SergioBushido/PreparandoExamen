<?php
namespace Sergi\Tarea5;

use PDO;
use PDOException;

class Conexion {



    public static function conectar() {
        $host = 'localhost';
        $dbname = 'practicaUnidad5';
        $usuario = 'root';
        $contrasena = '';

        try {
            $conexion = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $contrasena);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
            return null;
        }
    }

    public static function obtenerJugadores() {
        $conexion = self::conectar(); // Utiliza self:: para referenciar un método estático dentro de la misma clase

        if ($conexion) {
            try {
                $consulta = $conexion->query("SELECT * FROM jugadores");
                $jugadores = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $jugadores;
            } catch (PDOException $e) {
                echo "Error al obtener los datos: " . $e->getMessage();
                return null;
            }
        } else {
            return null;
        }
    }

    public static function insertarJugador($nombre, $apellidos, $dorsal, $posicion, $barcode) {
        $conexion = self::conectar();

        if ($conexion) {
            try {
                $stmt = $conexion->prepare("INSERT INTO jugadores (nombre, apellidos, dorsal, posicion, barcode) VALUES (:nombre, :apellidos, :dorsal, :posicion, :barcode)");
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellidos', $apellidos);
                $stmt->bindParam(':dorsal', $dorsal);
                $stmt->bindParam(':posicion', $posicion);
                $stmt->bindParam(':barcode', $barcode);
                $stmt->execute();
            } catch (PDOException $e) {
                echo "Error al insertar el jugador: " . $e->getMessage();
            }
        }
    }

    public static function existeDorsal($dorsal) {
        $conexion = self::conectar();

        if ($conexion) {
            try {
                $stmt = $conexion->prepare("SELECT COUNT(*) FROM jugadores WHERE dorsal = :dorsal");
                $stmt->bindParam(':dorsal', $dorsal);
                $stmt->execute();
                $count = $stmt->fetchColumn();

                return $count > 0;
            } catch (PDOException $e) {
                echo "Error al verificar el dorsal: " . $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }
    public static function existeCodigoBarras($codigoBarras) {
        $conexion = self::conectar();
    
        if ($conexion) {
            try {
                $stmt = $conexion->prepare("SELECT COUNT(*) FROM jugadores WHERE barcode = :codigoBarras");
                $stmt->bindParam(':codigoBarras', $codigoBarras);
                $stmt->execute();
                $count = $stmt->fetchColumn();
    
                return $count > 0;
            } catch (PDOException $e) {
                echo "Error al verificar el código de barras: " . $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }

    public static function hayJugadores() {
        $conexion = self::conectar();
    
        if ($conexion) {
            try {
                $stmt = $conexion->query("SELECT COUNT(*) FROM jugadores");
                $count = $stmt->fetchColumn();
    
                return $count > 0;
            } catch (PDOException $e) {
                echo "Error al verificar si existen jugadores: " . $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }
    
    

}


