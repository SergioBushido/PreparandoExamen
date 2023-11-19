<?php
// Iniciar la sesión para acceder a las variables de sesión
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['nombre'])) {
    // Si no ha iniciado sesión, redirigirlo a la página de inicio de sesión
    header('Location: login.php');
}

// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';

// Si pulsas el boton añadir name=compra
if (isset($_POST['comprar'])) {
    // Obtener el ID del producto seleccionado desde el formulario
    $productoId = $_POST['id'];

    // Se crea variable de sesion cesta con array asociativo con los datos del producto
    $_SESSION['cesta'][$productoId] = obtenerProductoPorId($productoId);
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
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Tema 4</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
        .fa-check-circle {
            color: green;
        }

        .fa-times-circle {
            color: red;
        }
    </style>
</head>

<body style="background: gray;">
    <!-- Sección de la barra superior con información del usuario y opciones -->
    <div class="float float-right d-inline-flex mt-2">
        <!-- Icono del carrito de compras y cantidad de productos en la cesta -->
        <i class="fa fa-shopping-cart mr-2 fa-2x"></i>
        <?php
        // Mostrar la cantidad de productos en la cesta, si existe la variable de sesión 'cesta'
        if (isset($_SESSION['cesta'])) {
            $cantidad = count($_SESSION['cesta']);
            echo "<input type='text' disabled class='form-control mr-2 bg-transparent text-white' value='$cantidad' size='2px'>";
        } else {
            // Si la cesta está vacía, mostrar '0'
            echo "<input type='text' disabled class='form-control mr-2 bg-transparent text-white' value='0' size='2px'>";
        }
        ?>
        <!-- Icono del usuario y nombre de usuario -->
        <i class="fas fa-user mr-3 fa-2x"></i>
        <input type="text" size='10px' value="<?php echo $_SESSION['nombre']; ?>" 
        class="form-control mr-2 bg-transparent text-white" disabled>
        <!-- Botón para salir/cerrar sesión -->
        <a href="cerrar.php" class="btn btn-warning mr-2">Cerrar sessión</a>
    </div>
    <br>
    <!-- Título de la página -->
    <h4 class="container text-center mt-4 font-weight-bold">Tienda Online</h4>
    <div class="container mt-3">
        <!-- Formulario para vaciar el carro y enlace para ir a la página de la cesta -->
        <form class="form-inline" name="vaciar" method="POST" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
            <a href="cesta.php" class="btn btn-success mr-2">Ir a Cesta</a>
            <!-- Botón para vaciar el carro (eliminar todos los productos de la cesta) -->
            <input type='submit' value='Vaciar Carro' class="btn btn-danger" name="vaciar">
        </form>
        <!-- Tabla para mostrar la lista de productos -->
        <table class="table table-striped table-dark mt-3 text-center">
            <thead>
                <tr>
                    <th scope="col">Añadir</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Añadido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Iterar a través de los productos y mostrarlos en la tabla
                while ($filas = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>";
                    // Formulario para añadir productos a la cesta
                    echo "<form action='{$_SERVER['PHP_SELF']}' method='POST'>";
                    // Campo oculto para enviar el ID del producto al enviar el formulario
                    echo "<input type='hidden' name='id' value='{$filas->id}'>";
                    // Verificar si el producto está en la cesta y mostrar el botón correspondiente
                    if (isset($_SESSION['cesta'][$filas->id])) {
                        // Si el producto está en la cesta, mostrar botón deshabilitado con marca de verificación 
                        //Aparece añadido y no de puede pulsar porque esta disabled
                        echo "<button type='submit' class='btn btn-primary' name='comprar' 
                        disabled><i class='fas fa-check'></i> Añadido</button>";
                    } else {
                        // Si el producto no está en la cesta, mostrar botón para añadirlo
                        echo "<button type='submit' class='btn btn-primary' name='comprar'>Añadir</button>";
                    }
                    echo "</form>";
                    echo "</td>";
                    //Despuès del boton añadir va el producto
                    // Mostrar nombre del producto y su precio en la tabla
                    echo "<td>{$filas->nombre}, Precio: {$filas->pvp} (€)</td>";
                    echo "<td>";
                    // Verificar si el producto está en la cesta y mostrar el icono correspondiente
                    if (isset($_SESSION['cesta'][$filas->id])) {
                        // Si el producto está en la cesta, mostrar marca de verificación
                        echo "<i class='fas fa-check-circle fa-2x'></i>";
                    } else {
                        // Si el producto no está en la cesta, mostrar círculo con cruz
                        echo "<i class='far fa-times-circle fa-2x'></i>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                // Cerrar la conexión a la base de datos
                cerrarTodo($conProyecto, $stmt);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

