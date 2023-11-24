<?php
session_start(); // Inicia la sesión (asegúrate de hacerlo al inicio de tu script)

require 'conexion.php';
$conexion = new Conexion();

if (isset($_POST['nombre']) && isset($_POST['pass'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];

    // Cambia la consulta para seleccionar el nombre y la contraseña correspondientes
    $sql = "SELECT * FROM usuarios WHERE nombre = :nombre AND pass = :pass";
    $stmt = $conexion->obtenerConexion()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $pass, PDO::PARAM_STR); // Utiliza PDO::PARAM_STR para datos de tipo cadena
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado) {
        $_SESSION['usuario'] = $nombre;
        echo header("Location: mostrar.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
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
    <h1>LOGIN</h1>

    <form action="" method="POST">
        Nombre: <input type="text" name="nombre">
        Password: <input type="password" name="pass">
        <input type="submit" value="Login">
    </form>
</body>
</html>