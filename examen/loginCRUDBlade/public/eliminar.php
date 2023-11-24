<?php
require '../vendor/autoload.php';
use Sergi\Productos;
use Sergi\Conexion;
use Philo\Blade\Blade;
session_start();

// Verificar si no hay sesión, redirigir a la página de login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$productos = new Productos();
//Necesario para ver los producotos
$datosProductos = $productos->obtener();


//Capturamos el id que nos viene con el href de eliminar
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $eliminar = $productos->eliminar($id);
    if ($eliminar) {
        header("Location: inicio.php");
        exit();
    }
}



$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'insertar';
$encabezado = "Hola " . $_SESSION['usuario'];


echo $blade->view()->make('vmostrar', compact('titulo', 'encabezado', 'datosProductos', 'eliminar'))->render();