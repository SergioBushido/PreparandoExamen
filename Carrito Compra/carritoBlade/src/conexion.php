<?php

namespace Sergi;

use PDO;
use PDOException;

class Conexion
{
    private $conProyecto;

    public function __construct()
    {
        $host = "localhost";
        $db = "empresa";
        $user = "root";
        $pass = "";
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

        try {
            $this->conProyecto = new PDO($dsn, $user, $pass);
            $this->conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //para establecer la conexion directamente con el constructor
            //$this->conProyecto->obtenerConexion();
        } catch (PDOException $ex) {
            die("Error en la conexión: mensaje: " . $ex->getMessage());
        }
    }

    public function obtenerConexion()
    {
        return $this->conProyecto;
    }


    public function obtenerProductos()
    {
        $consulta = "SELECT * FROM productos";
        $stmt = $this->conProyecto->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    
    public function obtenerProductoPorId($id)
    {
        $consulta = "SELECT id, nombre, pvp FROM productos WHERE Id = :id";
        $stmt = $this->conProyecto->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $producto;
    }

    public function cerrar()
    {
        $this->conProyecto = null;
    }

    public function cerrarTodo(&$st)
    {
        $st = null;
        $this->conProyecto = null;
    }
}
