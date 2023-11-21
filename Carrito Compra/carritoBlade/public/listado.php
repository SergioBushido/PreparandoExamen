<?php
// Iniciar la sesión para acceder a las variables de sesión
session_start();
// Incluir el archivo de conexión a la base de datos
require '../vendor/autoload.php';
use Philo\Blade\Blade;
use Sergi\Conexion;

$conexion = new Conexion();
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Tienda';
$encabezado = 'Tienda On-Line';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre'])) {
    // Si no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: login.php');
}



// Obtener la conexión a la base de datos
$conProyecto = $conexion->obtenerConexion();

// Si pulsas el boton añadir name=compra
if (isset($_POST['comprar'])) {
    // Obtener el ID del producto seleccionado desde el formulario
    $productoId = $_POST['id'];

    // Se crea variable de sesion cesta con array asociativo con los datos del producto
    //cada vez que se pulsa añadir se agrega un nuevo producto
    $_SESSION['cesta'][$productoId] =$conexion-> obtenerProductoPorId($productoId);
}

// Verificar si se ha enviado el formulario de vaciar el carro
if (isset($_POST['vaciar'])) {
    // Eliminar todos los productos de la cesta (eliminar la variable de sesión 'cesta')
    unset($_SESSION['cesta']);
}

// Consulta para obtener la lista de productos de la base de datos
$consulta = "select id, nombre, pvp from productos order by nombre";
$stmt = $conProyecto->prepare($consulta);

try {
    // Ejecutar la consulta
    $stmt->execute();
} catch (PDOException $ex) {
    // Manejar errores de la base de datos y mostrar un mensaje de error
    cerrarTodo($conProyecto, $stmt);
    die("Error al recuperar los productos " . $ex->getMessage());
}


$productos = $conexion->obtenerProductos();

echo $blade->view()->make('vistaTienda', compact('titulo', 'encabezado', 'productos'))->render();
?>
