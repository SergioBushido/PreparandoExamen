<?php
$host = "localhost";
$db = "empresa";
$user = "root";
$pass = "";
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";


try {
    $conProyecto = new PDO($dsn, $user, $pass);
    $conProyecto->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} 

catch (PDOException $ex) {
    die("Error en la conexión: mensaje: " . $ex->getMessage());
}

function obtenerProductos()
{
    global $conProyecto;
    $consulta = "SELECT nombre, pvp FROM productos";
    $stmt = $conProyecto->prepare($consulta);
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $productos;
}

function obtenerProductoPorId($id)
{
    global $conProyecto;
    $consulta = "SELECT id, nombre, pvp FROM productos WHERE id = :id";
    $stmt = $conProyecto->prepare($consulta);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $producto = $stmt->fetch(PDO::FETCH_ASSOC);
    return $producto;
}


function cerrar(&$con)
{
    $con = null;
}

function cerrarTodo(&$con, &$st)
{
    $st = null;
    $con = null;
}
?>
