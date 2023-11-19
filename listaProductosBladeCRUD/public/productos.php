<?php

require '../vendor/autoload.php';
use Clases\Familia;
use Clases\Producto;
use Philo\Blade\Blade;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Productos';
$encabezado = 'Listado de Productos';

$producto = new Producto();


// Lógica para eliminar un producto
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $producto->eliminarProducto($idEliminar);
}

// Lógica para insertar un nuevo producto
if (isset($_GET['insert'])) {
    $titulo = 'Insertar';
    $encabezado = 'Insertando Productos';

    // Crear un objeto Producto para ser utilizado en la vista
    $producto = new Producto();
    
    // Obtener las familias para el dropdown
    $familias = (new Familia())->recuperarFamilias();

    // Pasa las variables necesarias a la vista de inserción
    echo $blade->view()->make('vistaInsertar', compact('titulo', 'encabezado', 'producto', 'familias'))->render();
    exit;
}



if (isset($_POST['inserta'])) {
    $producto = new Producto();

    // Capturar los datos del formulario
    $nombre = $_POST['nombre'];
    $nombreC = $_POST['nombre_corto'];
    $pvp = $_POST['pvp'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];

    // Crear un array con los datos capturados en el formulario
    $datosProducto = [
        'nombre' => $nombre,
        'nombre_corto' => $nombreC,
        'pvp' => $pvp,
        'familia' => $familia,
        'descripcion' => $descripcion
    ];

    // Llamar a la función insertarProducto con los datos capturados
    $producto->insertarProducto($datosProducto);

    // Redirigir a vistaInsertar.blade.php usando una ruta absoluta
    header("Location: ../public/productos.php");
    exit;
}

if(isset($_GET['mostrar'])){
    $id=$_GET['mostrar'];
    $titulo = 'Mostrar';
    $encabezado = 'Mostrando el Producto';
    $producto = new Producto();
    $familias = (new Familia())->recuperarFamilias();
    $result=$producto->mostrar($id);
    echo $blade->view()->make('vistaMostrar', compact('titulo', 'encabezado', 'producto','familias', 'result'))->render();
    exit;
}

if(isset($_GET['modificar'])){
    $id=$_GET['modificar'];
    $titulo = 'Actualiza';
    $encabezado = 'Actualiza el Producto';
    $producto = new Producto();
    $familias = (new Familia())->recuperarFamilias();
    echo $blade->view()->make('vistaAtualizar', compact('titulo', 'encabezado', 'producto', 'familias', 'result'))->render();
    exit;
}

if (isset($_POST['modificar'])) {
    // Asegúrate de que los datos del formulario estén configurados correctamente
    $id = $_POST['id'][0];  // Tomar el primer elemento del array, ya que el campo es readonly y debería haber solo un valor
    $nombre = $_POST['nombre'][0];
    $nombre_corto = $_POST['nombre_corto'][0];
    $descripcion = $_POST['descripcion'][0];
    $pvp = $_POST['pvp'][0];
    $familia = $_POST['familia'][0];

    // Llama a la función actualiza con los datos del formulario
    $producto->actualiza($id, $nombre, $nombre_corto, $descripcion, $pvp, $familia);

    // Otras acciones o redirecciones aquí...
}




$productos = $producto->recuperarProductos();

echo $blade->view()->make('vistaProductos', compact('titulo', 'encabezado', 'productos'))->render();
?>
