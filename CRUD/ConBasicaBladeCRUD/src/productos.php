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
public function obtenerProductos()
    {
        $consulta = "SELECT * FROM productos";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();
        $productos = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    
    public function obtenerProductoPorId($id)
    {
        $consulta = "SELECT * FROM productos WHERE Id = :id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_OBJ);
    
        return $producto;
    }
    
    public function actualizarProducto($id, $nuevoNombre, $nuevades, $nuevoPvp)
    {
        $consulta = "UPDATE productos SET nombre = :nombre, descripción = :descrip, pvp = :pvp WHERE Id = :id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':nombre', $nuevoNombre, PDO::PARAM_STR);
        $stmt->bindParam(':descrip', $nuevades, PDO::PARAM_STR); // Corregir nombre de la columna
        $stmt->bindParam(':pvp', $nuevoPvp, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
        try {
            $stmt->execute();
            header("Location: mostrar.php");
            return true; // Éxito al actualizar el producto
        } catch (PDOException $e) {
            // Manejo de errores, puedes personalizar esto según tus necesidades
            return false; // Error al actualizar el producto
        }
    }
    

    public function insertarProductos($nombre, $descripcion, $pvp){

        
    $sql = "INSERT INTO productos (nombre, descripción, pvp) VALUES (?, ?, ?)";
   //lo mismo es acceder a la propiedad conexion que al metodo crearConexion()
    $stm = $this->crearConexion()->prepare($sql);

    // Corregir el orden de los parámetros en el bindParam
    $stm->bindParam(1, $nombre);
    $stm->bindParam(2, $descripcion);
    $stm->bindParam(3, $pvp);

    $stm->execute();

    header("Location: mostrar.php");
    exit();
    }

    public function eliminarProducto($id)
{
    $consulta = "DELETE FROM productos WHERE id = :id";
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