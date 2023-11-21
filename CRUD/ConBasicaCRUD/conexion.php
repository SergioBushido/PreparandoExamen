<?php

class Conexion {
    private $host = 'localhost';
    private $dbname = 'peaxamen';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function __construct() {
        try {
            // Establecer la conexión a la base de datos MySQL usando PDO
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            // Establecer el modo de error de PDO a excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Método para obtener la conexión PDO si es necesario
    public function obtenerConexion() {
        return $this->conn;
    }




    public function obtenerDatosProductos() {
        try {
            $resultados = array();
    
            // Preparar y ejecutar la consulta SQL para obtener datos de la tabla productos
            $consulta = $this->conn->prepare("SELECT * FROM productos");
            $consulta->execute();
    
            // Obtener los resultados como un array asociativo
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                // Almacenar cada fila en el array de resultados
                $resultados[] = $fila;
            }
    
            return $resultados;
        } catch (PDOException $e) {
            // Lanzar una excepción en caso de error
            throw new Exception("Error al obtener datos de productos: " . $e->getMessage());
        }
    }
    

    public function cerrarConexion() {
        // Cerrar la conexión
        $this->conn = null;
    }
}

?>
