<?php
require 'vendor/autoload.php';
use Sergi\Blade\Conexion;

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

if (isset($_POST['enviar'])) {
    $nombre = $_POST['nom']; // Cambiado de 'nom' a 'nombre'
    $apellido = $_POST['ape']; // Cambiado de 'ape' a 'apellido'
    $direccion = $_POST['dire']; // Cambiado de 'dir' a 'direccion'

    // Obtener datos de usuarios
    $inserta = $conexion->Insertar($nombre, $apellido, $direccion);
    header("Location: index.php");
    exit(); // Asegúrate de salir después de redirigir para evitar ejecución adicional del código
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" name="enviar">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Dirección</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="nom"></td> <!-- Cambiado de 'nom' a 'nombre' -->
                    <td><input type="text" name="ape"></td> <!-- Cambiado de 'ape' a 'apellido' -->
                    <td><input type="text" name="dire"></td> <!-- Cambiado de 'dir' a 'direccion' -->
                </tr>
            </tbody>
        </table>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>
