<?php

namespace Sergi;

use PDO;
use PDOException;

class Operaciones extends Conexion
{
    // Constructor de la clase, llama al constructor de la clase padre (Conexion)
    public function __construct()
    {
        parent::__construct();
    }

    //**********   1    ****************/
    //Metodo para mostrar la información
    // 1-cambiamos nombre de la tabla y nos vamos a la vinicio.blade
    public function mostrar()
    {                               
        $consulta = "SELECT * FROM datos";// <---
        $stmt = $this->conexion->prepare($consulta);
        $stmt->execute();
        $mostrar = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $mostrar;
    }



    //**********   2   ****************/
     //Metodo para eliminar
     //2 modificamos nombre de la tabla con eso esta todo si se elimina con la id
     public function eliminar($id)
     {                              //
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



    //**********   3   ****************/
    //Metodo para mostrar información por id
    //3 modificamos nombre de la tabla y nos vamos a vmostrar.blade a modificar los valores
    public function obtenerPorId($id)
    {
        $consulta = "SELECT * FROM datos WHERE id = :id";
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_OBJ);

        return $producto;
    }


    
    //**********   4   ****************/
    //Metodo para insertar
    //agregamos o quitamos los datos de la nueva tabla
    //despues vamos a vinsertar.blade a meter los datos al formualrio
    public function insertar($nombre, $descripcion, $pvp)
    {
        $sql = "INSERT INTO datos (nombrec, descripciónc, pvpc) VALUES (?, ?, ?)";
        //lo mismo es acceder a la propiedad conexion que al metodo crearConexion()
        $stm = $this->crearConexion()->prepare($sql);

        $stm->bindParam(1, $nombre);
        $stm->bindParam(2, $descripcion);
        $stm->bindParam(3, $pvp);

        $stm->execute();

        $mensaje="Dato insertado";
        header("Location: inicio.php?mensaje=$mensaje");
        exit();
    }



    //**********   5   ****************/
    //Metodo para actualizar
    //metemos los campos de la base de datos
    //Nos vamos a vactualizar.blade
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




   
}
