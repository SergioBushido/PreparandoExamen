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

$titulo = 'Pagar';
$encabezado = 'Compra realizada correctamente';

echo $blade->view()->make('vistaPagar', compact('titulo', 'encabezado'))->render();
?>
