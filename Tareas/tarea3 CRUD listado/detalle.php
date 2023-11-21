<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Detalle del Producto</title>
    <!-- Enlaces a Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container mt-5">

    <?php
    include('conexion.php'); // Incluye el archivo de conexión

    if (isset($_POST['detalle'])) {
        // Obtener el ID del producto seleccionado del formulario en listado.php
        $codProd = $_POST['producto'];

        // Realizar una consulta para obtener los detalles del producto
        $consulta = "SELECT id, nombre, pvp, descripcion, tipo FROM productos WHERE id=$codProd";

        // Establecer la conexión a la base de datos
        $conProyecto = new mysqli('localhost', 'root', '', 'empresa');

        if ($conProyecto->connect_error) {
            die('Error de Conexión (' . $conProyecto->connect_errno . ') ' . $conProyecto->connect_error);
        }

        // Ejecutar la consulta
        $resultado1 = $conProyecto->query($consulta);

        if ($resultado1) {
            // Obtener los detalles del producto
            $fila = $resultado1->fetch_assoc();
        } else {
            echo "Error al recuperar los detalles del producto: " . $conProyecto->error;
        }

        // Cerrar la conexión
        $conProyecto->close();
    } else {
        // Si no se ha hecho clic en el botón "Detalle", redirigir a la página de listado.php
        header("Location: listado.php");
        exit();
    }
    ?>

    <h4 class="mb-4">Detalle del Producto: <?php echo $fila['id'] . " - " . $fila['nombre']; ?></h4>
    <table class="table table-bordered">
        <tr>
            <th>Identificador del Producto</th>
            <td><?php echo $fila['id']; ?></td>
        </tr>
        <tr>
            <th>Nombre del Producto</th>
            <td><?php echo $fila['nombre']; ?></td>
        </tr>
        <tr>
            <th>Precio</th>
            <td>€<?php echo number_format($fila['pvp'], 2, ',', '.'); ?></td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td><?php echo $fila['descripcion']; ?></td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td><?php echo $fila['tipo']; ?></td>
        </tr>
    </table>

    <h4 class="mt-4 mb-2">Actualizar Información</h4>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="producto_id" value="<?php echo $fila['id']; ?>">
        <div class="form-group">
            <label for="nuevoNombre">Nuevo Nombre:</label>
            <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" value="<?php echo $fila['nombre']; ?>">
        </div>
        <div class="form-group">
            <label for="nuevoPrecio">Nuevo Precio:</label>
            <input type="text" class="form-control" id="nuevoPrecio" name="nuevoPrecio" value="<?php echo $fila['pvp']; ?>">
        </div>
        <div class="form-group">
            <label for="nuevaDescripcion">Nueva Descripción:</label>
            <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" value="<?php echo $fila['descripcion']; ?>">
        </div>

        <div class="form-group">
            <label for="nuevoTipo">Nuevo Tipo:</label>
            <input type="text" class="form-control" id="nuevoTipo" name="nuevoTipo" value="<?php echo $fila['tipo']; ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
    </form>

    <form class="mt-3" action="borrar.php" method="post">
        <input type="hidden" name="producto_id" value="<?php echo $fila['id']; ?>">
        <button type="submit" class="btn btn-danger" name="eliminar">Eliminar Producto</button>
    </form>
     <!-- Botón Volver a listado.php -->
     <a href="listado.php" class="btn btn-secondary mt-3">Volver a Listado</a>

    <!-- Enlaces a Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   

</body>

</html>
