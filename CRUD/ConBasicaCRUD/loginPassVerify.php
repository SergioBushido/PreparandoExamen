<?php
session_start();

require 'conexion.php';
$conexion = new Conexion();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['pass'])) {
        $nombre = $_POST['nombre'];
        $pass = $_POST['pass'];

        // Obtener el hash almacenado en la base de datos
        $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
        try {
            $stmt = $conexion->obtenerConexion()->prepare($sql);
            $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado) {
                // Verificar la contraseña utilizando password_verify
                //esto compara el valor escrito por usuario y password_verify se encarga de comparlo con 
                //el de la base de datos
                if (password_verify($pass, $resultado['pass'])) {
                    // Autenticación exitosa
                    $_SESSION['usuario'] = $nombre;
                    echo "Autenticación exitosa";
                    exit();
                } else {
                    echo "Usuario o contraseña incorrectos";
                }
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
        }
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