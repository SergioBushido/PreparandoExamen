<?php

require_once 'conexion.php';

if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Enviamos un encabezado de autenticación básica y un código de estado 401 Unauthorized.
    header("WWW-Authenticate: Basic realm='Contenido restringido'");
    header("HTTP/1.0 401 Unauthorized");
    // Terminamos la ejecución del script.
    die();
}

// Hacemos la consulta para verificar las credenciales del usuario.
$consulta = "SELECT * FROM usuarios WHERE nombre=:u AND password=:p";
$stmt = $conexion->prepare($consulta);

try {

    $pass = $_SERVER['PHP_AUTH_PW'];
    $passhash = hash('sha256', $pass);
    // Ejecutamos la consulta, pasando el nombre de usuario y el hash de la contraseña como parámetros.
    $stmt->execute([
        ':u' => $_SERVER['PHP_AUTH_USER'],
        ':p' => $passhash,
    ]);
} catch (PDOException $ex) {
    // Si hay un error al ejecutar la consulta, mostramos un mensaje de error y terminamos la ejecución.
    $conexion = null;
    die("Error al recuperar las datos de Mysql: " . $ex->getMessage());
}

// Si la consulta no devuelve ninguna fila, las credenciales son erróneas.
if ($stmt->rowCount() === 0) {
    // Enviamos un encabezado de autenticación básica y un código de estado 401 Unauthorized.
    header("WWW-Authenticate: Basic realm='Contenido restringido'");
    header("HTTP/1.0 401 Unauthorized");
    // Liberamos los recursos y terminamos la ejecución del script.
    $stmt = null;
    $conexion = null;
    die();
} else {
    header("Location: wellcome.php");
}

// Liberamos los recursos de la consulta y la conexión a la base de datos.
$stmt = null;
$conexion = null;
