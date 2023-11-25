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

//4.2
//si en la vinsertar pulsan insertar en el formulario capturamos sus valores
//nos vamos a update punto 5 operaciones
if (isset($_POST['insertar'])){

    //4.2 agregamos todos los valores del formulario

    $nombre=$_POST['nom'];
    $descripcion=$_POST['des'];
    $pvp=$_POST['pvp'];

                                    //aqui tb !!!!!
    $datos = $mostrarDatos->insertar( $nombre,  $descripcion,  $pvp );
    
}




$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'insertar';
$encabezado = "Hola " . $_SESSION['usuario'];


echo $blade->view()->make('vinsertar', compact('titulo', 'encabezado'))->render();