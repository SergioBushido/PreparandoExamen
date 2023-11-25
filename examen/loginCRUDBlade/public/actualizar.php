<?php
require '../vendor/autoload.php';
use Sergi\Operaciones;
use Philo\Blade\Blade;
session_start();

$mostrarDatos = new Operaciones();

// Verificar si no hay sesión, redirigir a la página de login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Capturamos el id que nos viene con el href de actualizar
// para mostrar el producto a actualizar
$actualiza = null;

//si pulsamos actualizar desde la vista mostrar, con el id de lo que queramos ver, nos manda a vactualizar
//con el formulario para actualizar
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $actualiza = $mostrarDatos->obtenerPorId($id);
    $views = '../views';
    $cache = '../cache';
    $blade = new Blade($views, $cache );

    $titulo = 'actualizar';
    $encabezado = "Hola " . $_SESSION['usuario'] . " actualiza el producto";
    $actualizarMensaje = null;
    echo $blade->view()->make('vactualizar', compact('titulo', 'encabezado', 'actualiza', 'actualizarMensaje'))->render();
}

// Capturamos el id del producto para actualizar en la base de datos

//5.2
//venimos de vactualizar.blade
//capturamos los valores del formulario y asignamos variables
//si pulsamos actualizar desde el formualario en la vista actulacizar
if(isset($_POST['actualizar'])){

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $des = $_POST['des'];
    $pvp = $_POST['pvp'];
    
    // Intentar actualizar el producto y verificar si fue exitoso
                                            //agregamos las variables
    $actualizar = $mostrarDatos->actualizar($id, $nom, $des, $pvp);

    

    if ($actualizar) {
        $mensaje = "Dato actualizado";
        header("Location: inicio.php?mensaje=$mensaje");
        exit();
    }
}



