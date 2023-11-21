<?php
require '../vendor/autoload.php';
use Sergi\Productos;
use Sergi\Conexion;
use Philo\Blade\Blade;
session_start();

$productos = new Productos();

// Verificar si no hay sesión, redirigir a la página de login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Capturamos el id que nos viene con el href de actualizar
// para mostrar el producto a actualizar
$actualiza = null;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $actualiza = $productos->obtenerProductoPorId($id);
}

// Capturamos el id del producto para actualizar en la base de datos
$actualizarMensaje = null;

if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $des = $_POST['des'];
    $pvp = $_POST['pvp'];
    
    // Intentar actualizar el producto y verificar si fue exitoso
    $actualizar = $productos->actualizarProducto($id, $nom, $des, $pvp);

    if ($actualizar) {
        $actualizarMensaje = "Producto actualizado con éxito";
        // Puedes cargar nuevamente el producto actualizado si es necesario
        $actualiza = $productos->obtenerProductoPorId($id);
    } else {
        $actualizarMensaje = "Error al actualizar el producto";
    }
}

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'actualizar';
$encabezado = "Hola " . $_SESSION['usuario']. " actualiza el producto";

echo $blade->view()->make('vactualizar', compact('titulo', 'encabezado', 'actualiza', 'actualizarMensaje'))->render();
