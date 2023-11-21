<?php
// A la base pruebas tabla datos_usuarios
$host = "localhost";
$dbname = "pruebas";
$nom = "root";
$pass = "";

try {
    // Establecer la conexión a la base de datos MySQL usando PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $nom, $pass);

    // Establecer el modo de error de PDO a excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die(); // Terminar el script si hay un error en la conexión
}


?>
