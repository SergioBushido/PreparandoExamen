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


//Capturamos el id que nos viene con el href de eliminar
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $eliminar = $mostrarDatos->eliminar($id);
    if ($eliminar) {
        $mensaje="Dato eliminado";
        header("Location: inicio.php?mensaje=$mensaje");
        exit();
    }
}



$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'insertar';
$encabezado = "Hola " . $_SESSION['usuario'];


echo $blade->view()->make('vmostrar', compact('titulo', 'encabezado', 'datos', 'eliminar'))->render();