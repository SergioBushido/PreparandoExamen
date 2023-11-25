<?php
require '../vendor/autoload.php';
use Sergi\Operaciones;
use Philo\Blade\Blade;
session_start();

// Verificar si no hay sesión, redirigir a la página de login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$mostrarDatos = new Operaciones();
$datos = $mostrarDatos->mostrar();

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Mostar';
$encabezado = "Hola " . $_SESSION['usuario'];


echo $blade->view()->make('vinicio', compact('titulo', 'encabezado', 'datos'))->render();
?>






