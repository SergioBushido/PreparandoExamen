<?php

namespace Sergi;

use PDO;
use PDOException;

class Login extends Conexion
{

    
 // Constructor de la clase, llama al constructor de la clase padre (Conexion)
 public function __construct()
 {
     parent::__construct();
 }



public function log($nombre, $hash) {
    
    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre AND pass = :pass";
   
    $stmt = $this->crearConexion()->prepare($sql);

    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $hash, PDO::PARAM_STR);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $_SESSION['usuario'] = $nombre;
        header("Location: inicio.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos";
    }
}

}