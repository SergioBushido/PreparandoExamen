<?php
require 'conexion.php'; // Incluye el archivo de conexión usando require para asegurar que el script se detenga si hay errores

// Mensajes de éxito o error después de actualizar o eliminar un producto
$successMessage = isset($_GET['success']) ? $_GET['success'] : '';
if ($successMessage === 'eliminar') {
    $message = "Producto eliminado con éxito";
    $alertClass = "alert-success";
} elseif ($successMessage === 'actualizar') {
    $message = "Producto actualizado con éxito";
    $alertClass = "alert-success";
} elseif ($successMessage === 'crear') {
    $message = "Producto creado con éxito";
    $alertClass = "alert-success";
} else {
    $message = "";
    $alertClass = "";
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlaces a Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <!--Estilos CSS comentados para que no interfieran con bootstrap
   <link rel="stylesheet" href="CSS/styles.css"> -->
    <title>Tarea Tema 3</title>
</head>
<body class="bg-light">

    <div class="container">
        <h3>Productos Existentes</h3>
        <!-- Formulario para elegir un producto -->
        <form name="f1" action='detalle.php' method="POST">
            <div class="form-group">
                <label for="p">Elige un producto </label>
                <select class="form-control" id="p" name="producto">
                    <?php
                    // Consulta para obtener la lista de productos
                    $consulta = "SELECT id, nombre FROM productos ORDER BY nombre";
                    if (!($resultado = $conProyecto->query($consulta))) {
                        die("Error al recuperar los productos!!! " . $conProyecto->error);
                    }
                    // Muestra las opciones en el select
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<option value='{$fila['id']}'>" . $fila['id'] . " / " . $fila['nombre'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mt-2">
                <input type="submit" class="btn btn-primary" value="Detalle" name="detalle">
            </div>
        </form>
        <!-- Formulario para crear un nuevo producto -->
        <form action="crear.php" method="POST">
            <div class="mt-2">
                <input type="submit" class="btn btn-primary" value="Crear Producto">
            </div>
        </form>
    </div>

    <!-- Tabla de Productos -->
    <div class="container mt-3">
        <h4>Lista de Productos</h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Identificador del Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Consulta para obtener la lista de productos
                    $consulta = "SELECT id, nombre, pvp, descripcion, tipo FROM productos ORDER BY nombre";
                    if (!($resultado = $conProyecto->query($consulta))) {
                        die("Error al recuperar los productos!!! " . $conProyecto->error);
                    }
                    // Muestra los productos en la tabla
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$fila['id']}</td>";
                        echo "<td>{$fila['nombre']}</td>";
                        echo "<td>€" . number_format($fila['pvp'], 2, ',', '.') . "</td>";
                        echo "<td>{$fila['descripcion']}</td>";
                        echo "<td>{$fila['tipo']}</td>";
                        echo "</tr>";
                    }
                    cerrarConexion(); // Cierra la conexión a la base de datos
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Etiqueta div para mostrar mensajes -->
    <div class="container mt-3">
        <div id="mensaje">
            <?php
            if ($message) {
                echo "<div class='alert $alertClass'>$message</div>";
            }
            ?>
        </div>
    </div>

</body>

</html>
