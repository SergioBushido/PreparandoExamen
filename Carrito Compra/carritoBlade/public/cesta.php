<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.php');
}

// Incluir el archivo de conexión a la base de datos
require '../vendor/autoload.php';
use Philo\Blade\Blade;
use Sergi\Conexion;

$conexion = new Conexion();
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Cesta';
$encabezado = 'Tu cesta de compras';

echo $blade->view()->make('vistaCesta', compact('titulo', 'encabezado'))->render();
?>
