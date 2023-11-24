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



if (isset($_POST['enviar'])){
    $nombre=$_POST['nom'];
    $descripcion=$_POST['des'];
    $pvp=$_POST['pvp'];
    $datosProductos = $productos->insertar( $nombre,  $descripcion,  $pvp );
    echo $blade->view()->make('vinsertar', compact('titulo', 'encabezado', 'datosProductos'))->render();
}




$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'insertar';
$encabezado = "Hola " . $_SESSION['usuario'];


echo $blade->view()->make('vinsertar', compact('titulo', 'encabezado'))->render();