<?php

namespace Sergi\Blade;

use PDO;
use PDOException;

class Conexion
{
    private $host = 'localhost';
    private $dbname = 'pruebas';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct()
    {
        try {
            // Establecer la conexión a la base de datos MySQL usando PDO
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            // Establecer el modo de error de PDO a excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function obtenerDatosUsuarios()
    {
        try {
            // Preparar y ejecutar la consulta SQL para obtener datos de la tabla datos_usuarios
            $consulta = $this->conn->prepare("SELECT id, Nombre, Apellido, Direccion FROM datos_usuarios");
            $consulta->execute();
            // Obtener los resultados como un array asociativo
            $datos = array();
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return array(); // Devuelve un array vacío en caso de error
        }
    }

    public function Insertar($nombre, $apellido, $direccion)
    {
        try {
            // Preparar y ejecutar la consulta SQL para insertar datos en la tabla datos_usuarios
            $consulta = $this->conn->prepare("INSERT INTO datos_usuarios (Nombre, Apellido, Direccion) VALUES (?, ?, ?)");
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $apellido);
            $consulta->bindParam(3, $direccion);
            $consulta->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function eliminar($id)
    {
        try {
            // Preparar y ejecutar la consulta SQL para insertar datos en la tabla datos_usuarios
            $consulta = $this->conn->prepare("DELETE from datos_usuarios WHERE id= :id");
            $consulta->bindParam(":id", $id);

            $consulta->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function mostrar($id)
    {
        try {
            // Preparar y ejecutar la consulta SQL para insertar datos en la tabla datos_usuarios
            $consulta = $this->conn->prepare("SELECT * from datos_usuarios WHERE id= :id");
            $consulta->bindParam(":id", $id);

            $consulta->execute();
            $datos = array();
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = $fila;
            }
            return $datos;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function actualizar($id, $nombre, $apellido, $direccion)
    {
        try {
            // Preparar y ejecutar la consulta SQL para insertar datos en la tabla datos_usuarios
            $consulta = $this->conn->prepare("UPDATE datos_usuarios SET Nombre = ?, Apellido = ?, Direccion = ? WHERE id = ?");
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $apellido);
            $consulta->bindParam(3, $direccion);
            $consulta->bindParam(4, $id);

            $consulta->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }



    public function cerrarConexion()
    {
        // Cerrar la conexión
        $this->conn = null;
    }
}
