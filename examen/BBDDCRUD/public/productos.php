<?php

require '../vendor/autoload.php';
use Clases\Categorias;
use Clases\Producto;
use Philo\Blade\Blade;

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Productos';
$encabezado = 'Listado de Productos';


//hacemos instacia de productos para utilizar sus metodos para poder 
//operar con la tabla que queramos atacar
$producto = new Producto();


// Cuando desde la vista de productos de pulsa eliminar producto
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    $producto->eliminarProducto($idEliminar);
}

// Desde la pagina principal pulsamos insertar producto nos llevara a 
//vista insertar donde  tendremos la vista para insertar
//aqui se instancia el metodo para ver los datos de la otra tabla
if (isset($_GET['insert'])) {
    $titulo = 'Insertar';
    $encabezado = 'Insertando Productos';

    // Crear un objeto Producto para ser utilizado en la vista
    $producto = new Producto();
    
    // Instancia para recuperar la informacion de la tabla de la clave foranea
    $categorias = (new Categorias())->recuperarCategorias();

    // Pasa las variables necesarias a la vista de inserción
    echo $blade->view()->make('vistaInsertar', compact('titulo', 'encabezado', 'producto', 'categorias'))->render();
    exit;
}


//Dentro de la vista para insertar este es el formulario que inserta
//cuando pulsamos el submit "insertar producto" name="inserta"
if (isset($_POST['inserta'])) {
    $producto = new Producto();

    // Capturar los datos del formulario
    $nombre = $_POST['nombre'];
    $nombreC = $_POST['nombre_corto'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];

    // Crear un array con los datos capturados en el formulario
    $datos = [
        'nombre' => $nombre,
        'nombre_corto' => $nombreC,
        'precio' => $precio,
        'categoria' => $categoria,
        'descripcion' => $descripcion
    ];

    // Llamar a la función insertarProducto con los datos capturados
    $producto->insertarProducto($datos);

    // Redirigir a vistaInsertar.blade.php usando una ruta absoluta
    header("Location: ../public/productos.php");
    exit;
}

//Si pulsamos mostrar desde la pagina pricipal (vistaProductos)
//nos enviara a la vista para mostrar el producto (vistaProductos)
//como es una tabla con clave foranea instanciamos categorias para ver su contenido
if(isset($_GET['mostrar'])){
    $id=$_GET['mostrar'];
    $titulo = 'Mostrar';
    $encabezado = 'Mostrando el Producto';
    $producto = new Producto();

    //aqui consultamos datos de tabla con clave foranea
    $categorias = (new Categorias())->recuperarCategorias();

    //mostramos el producto segun su id
    $result=$producto->mostrar($id);

    //nos vamos a la vistaMostrar donde dale el producto con sus datos
    echo $blade->view()->make('vistaMostrar', compact('titulo', 'encabezado', 'producto','categorias', 'result'))->render();
    exit;
}
//esto no esta implementado aun
if(isset($_GET['modificar'])){
    $id=$_GET['modificar'];
    $titulo = 'MOdifica';
    $encabezado = 'MOdifica el Producto';
    $producto = new Producto();
    $categoria = (new Categorias())->recuperarCategorias();
    echo $blade->view()->make('vistaMostrar', compact('titulo', 'encabezado', 'producto', 'categoria', 'result'))->render();
    exit;
}

if (isset($_POST['modificar'])) {
    // Asegúrate de que los datos del formulario estén configurados correctamente
    $id = $_POST['id'][0];  // Tomar el primer elemento del array, ya que el campo es readonly y debería haber solo un valor
    $nombre = $_POST['nombre'][0];
    $nombre_corto = $_POST['nombre_corto'][0];
    $descripcion = $_POST['descripcion'][0];
    $precio = $_POST['precio'][0];
    $categoria = $_POST['categoria'][0];

    // Llama a la función actualiza con los datos del formulario
    $producto->actualiza($id, $nombre, $nombre_corto, $descripcion, $precio, $categoria);

    
}




$productos = $producto->recuperarProductos();

echo $blade->view()->make('vistaProductos', compact('titulo', 'encabezado', 'productos'))->render();
?>
