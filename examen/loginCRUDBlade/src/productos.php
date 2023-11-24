<?php

namespace Sergi;

use PDO;
use PDOException;

class Productos extends Conexion
{
    // Constructor de la clase, llama al constructor de la clase padre (Conexion)
    public function __construct()
    {
        parent::__construct();
    }

    //Metodo para mostrar la información
    public function obtener()
    {
        $consulta = "SELECT * FROM datos";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }


    //Metodo para mostrar información por id
    public function obtenerPorId($id)
    {
        $consulta = "SELECT * FROM datos WHERE id = :id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_OBJ);

        return $producto;
    }


    //Metodo para actualizar
    public function actualizar($id, $nuevoNombre, $nuevades, $nuevoPvp)
    {
        $consulta = "UPDATE datos SET nombrec = :nombre, descripciónc = :descrip, pvpc = :pvp WHERE id = :id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
        $stmt->bindParam(':descrip', $nuevades, PDO::PARAM_STR); // Corregir nombre de la columna
        $stmt->bindParam(':pvp', $nuevoPvp, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
            header("Location: inicio.php");
            return true; // Éxito al actualizar el producto
        } catch (PDOException $e) {
            // Manejo de errores, puedes personalizar esto según tus necesidades
            return false; // Error al actualizar el producto
        }
    }



    //Metodo para insertar
    public function insertar($nombre, $descripcion, $pvp)
    {


        $sql = "INSERT INTO datos (nombrec, descripciónc, pvpc) VALUES (?, ?, ?)";
        //lo mismo es acceder a la propiedad conexion que al metodo crearConexion()
        $stm = $this->crearConexion()->prepare($sql);

        // Corregir el orden de los parámetros en el bindParam
        $stm->bindParam(1, $nombre);
        $stm->bindParam(2, $descripcion);
        $stm->bindParam(3, $pvp);

        $stm->execute();

        header("Location: inicio.php");
        exit();
    }


    //Metodo para eliminar
    public function eliminar($id)
    {
        $consulta = "DELETE FROM datos WHERE id = :id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            $stmt->execute();
            return true; // Éxito al eliminar el producto
        } catch (PDOException $e) {
            // Manejo de errores, puedes personalizar esto según tus necesidades
            return false; // Error al eliminar el producto
        }
    }
}
