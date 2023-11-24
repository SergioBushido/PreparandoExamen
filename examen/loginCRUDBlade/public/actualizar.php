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

//pulsamos actualizar desde la vista mostrar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $actualiza = $productos->obtenerPorId($id);
    $views = '../views';
    $cache = '../cache';
    $blade = new Blade($views,
        $cache
    );

    $titulo = 'actualizar';
    $encabezado = "Hola " . $_SESSION['usuario'] . " actualiza el producto";
    $actualizarMensaje = null;
    echo $blade->view()->make('vactualizar', compact('titulo', 'encabezado', 'actualiza', 'actualizarMensaje'))->render();
}

// Capturamos el id del producto para actualizar en la base de datos


//pulasamos actualizar desde el formualario en la vista actulacizar
if(isset($_POST['actualizar'])){
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $des = $_POST['des'];
    $pvp = $_POST['pvp'];
    
    // Intentar actualizar el producto y verificar si fue exitoso
    $actualizar = $productos->actualizar($id, $nom, $des, $pvp);

    if ($actualizar) {
        $actualizarMensaje = "Producto actualizado con éxito";
        // Puedes cargar nuevamente el producto actualizado si es necesario
        $actualiza = $productos->obtenerPorId($id);
    } else {
        $actualizarMensaje = "Error al actualizar el producto";
    }
    echo $blade->view()->make('vinicio', compact('titulo', 'encabezado'))->render();

}



