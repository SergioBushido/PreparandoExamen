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

if(isset($_GET['id'])){
$id=$_GET['id'];

}

$mostrarDatos = new Operaciones();
$datos = $mostrarDatos->obtenerPorId($id);

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Mostar';
$encabezado = "Hola " . $_SESSION['usuario'];


echo $blade->view()->make('vmostrar', compact('titulo', 'encabezado', 'datos'))->render();
?>

