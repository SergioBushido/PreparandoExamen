<?php

// Definimos el namespace para la clase Producto en el directorio Clases
namespace Clases;

// Importamos las clases PDO y PDOException para trabajar con la base de datos
use PDO;
use PDOException;

// La clase Producto extiende de la clase Conexion
class Producto extends Conexion
{
    // Propiedades privadas que representan los atributos de un producto
    private $id;
    private $nombre;
    private $nombre_corto;
    private $descripcion;
    private $precio;
    private $categoria;

    // Constructor de la clase, llama al constructor de la clase padre (Conexion)
    public function __construct()
    {
        parent::__construct();
    }

    // Método para recuperar todos los productos de la base de datos y devolverlos como objetos
    function recuperarProductos()
    {
        // Consulta SQL para seleccionar todos los productos y ordenarlos por nombre
        $consulta = "SELECT * FROM materiales_informaticos";
        
        // Preparamos la consulta
        $stmt = $this->conexion->prepare($consulta);

        try {
            // Ejecutamos la consulta
            $stmt->execute();
        } catch (PDOException $ex) {
            // En caso de error, mostramos un mensaje y terminamos la ejecución del script
            die("Error al recuperar productos: " . $ex->getMessage());
        }

        // Cerramos la conexión a la base de datos
        $this->conexion = null;

        // Devolvemos los resultados de la consulta como un array de objetos
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Método para eliminar un producto por su ID
    public function eliminarProducto($id)
    {
        // Consulta SQL para eliminar un producto por su ID
        $consulta = "DELETE FROM materiales_informaticos WHERE id = :id";

        // Preparamos la consulta
        $stmt = $this->conexion->prepare($consulta);

        // Vinculamos el parámetro :id con el valor proporcionado
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            // Ejecutamos la consulta
            $stmt->execute();
        } catch (PDOException $ex) {
            // En caso de error, mostramos un mensaje y terminamos la ejecución del script
            die("Error al eliminar el producto: " . $ex->getMessage());
        }
    }
    public function insertarProducto($datos)
    {
        try {
            // Consulta SQL para insertar un nuevo producto
            $consulta = "INSERT INTO materiales_informaticos (nombre, nombre_corto, descripcion, precio, categoria) VALUES (:nombre, :nombre_corto, :descripcion, :precio, :categoria)";
            
            // Preparamos la consulta
            $stmt = $this->conexion->prepare($consulta);
        
            // Vinculamos los parámetros con los valores proporcionados en el formulario
            $stmt->bindParam(':nombre', $datos['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':nombre_corto', $datos['nombre_corto'], PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $datos['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
            $stmt->bindParam(':categoria', $datos['categoria'], PDO::PARAM_STR); // Puedes cambiar a PDO::PARAM_INT si la familia es un número
        
            // Ejecutamos la consulta
            $stmt->execute();
    
            // Si llegamos aquí, la inserción fue exitosa
            echo "Producto insertado exitosamente.";
    
        } catch (PDOException $ex) {
            // En caso de error, mostramos un mensaje
            die("Error al insertar el producto: " . $ex->getMessage());
        }
    }
    function mostrar($id)
    {
        // Consulta SQL para seleccionar todos los productos y ordenarlos por nombre
        $consulta = "SELECT * FROM materiales_informaticos WHERE id= :id";
        
        // Preparamos la consulta
        $stmt = $this->conexion->prepare($consulta);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        try {
            // Ejecutamos la consulta
            $stmt->execute();
        } catch (PDOException $ex) {
            // En caso de error, mostramos un mensaje y terminamos la ejecución del script
            die("Error al recuperar productos: " . $ex->getMessage());
        }

        // Cerramos la conexión a la base de datos
        $this->conexion = null;

        // Devolvemos los resultados de la consulta como un array de objetos
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function actualiza($id, $nombre, $nombre_corto, $descripcion, $precio, $categoria)
    {
        try {
            $sql = "UPDATE materiales_informaticos SET nombre = :nombre, nombre_corto = :nombre_corto, descripcion = :descripcion, precio = :precio,  categoria = :categoria WHERE id = :id";
            $update = $this->conexion->prepare($sql);
    
            $update->bindParam(':nombre', $nombre);
            $update->bindParam(':nombre_corto', $nombre_corto);
            $update->bindParam(':precio', $precio);
            $update->bindParam(':descripcion', $descripcion);
            $update->bindParam(':categoria', $categoria);
            $update->bindParam(':id', $id);
    
            $update->execute();
    
            echo "Operación de actualización realizada con éxito.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    
    
}

