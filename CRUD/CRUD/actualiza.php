<?php
require 'conexion.php';

// Variables para almacenar los datos del usuario
$id = '';
$nombre = '';
$apellido = '';
$direccion = '';

// Si pulsamos "enviar" para mostrar un usuario
if (isset($_POST['enviar'])) {
    $codProd = $_POST['datos'];
    $consulta = $conexion->prepare("SELECT id, Nombre, Apellido, Direccion FROM datos_usuarios WHERE id=:d");
    $consulta->bindParam(":d", $codProd);
    $consulta->execute();

    // Obtener los datos del usuario
    if ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        $id = $fila['id'];
        $nombre = $fila['Nombre'];
        $apellido = $fila['Apellido'];
        $direccion = $fila['Direccion'];
    }
}

// Si pulsamos "actualizar"
if (isset($_POST['actualizar'])) {
    // Obtener los datos del formulario
    $id = $_POST['producto_id'];
    $nuevoNombre = $_POST['nuevoNombre'];
    $nuevoApellido = $_POST['nuevoApellido'];
    $nuevaDireccion = $_POST['nuevaDireccion'];

    // Actualizar los datos en la base de datos usando una consulta preparada
    $consulta = $conexion->prepare("UPDATE datos_usuarios SET Nombre = :nombre, Apellido = :apellido, Direccion = :direccion WHERE id = :id");
    $consulta->bindParam(":nombre", $nuevoNombre);
    $consulta->bindParam(":apellido", $nuevoApellido);
    $consulta->bindParam(":direccion", $nuevaDireccion);
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    echo "<h2>Usuario actualizado</h2>";
}

//si pulsamos "eliminar"
if (isset($_POST['eliminar'])) {
    // Obtener los datos del formulario
    $id = $_POST['producto_id'];


    // Elimina el usuario en la base de datos usando una consulta preparada
    $consulta = $conexion->prepare("DELETE from datos_usuarios WHERE id=:id");
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    echo "<h2>Usuario elimindado</h2>";
}

//si pulsamos insertar
if (isset($_POST['insertar'])) {

    $nuevoNombre = $_POST['nuevo_nombre'];
    $nuevoApellido = $_POST['nuevo_apellido'];
    $nuevaDireccion = $_POST['nueva_direccion'];

    // Preparar la consulta con marcadores de posición
    $consulta = $conexion->prepare("INSERT INTO datos_usuarios (Nombre, Apellido, Direccion) VALUES (:nombre, :apellido, :direccion)");

    // Vincular los valores de los marcadores de posición con las variables
    $consulta->bindParam(":nombre", $nuevoNombre);
    $consulta->bindParam(":apellido", $nuevoApellido);
    $consulta->bindParam(":direccion", $nuevaDireccion);

    // Ejecutar la consulta
    $consulta->execute();

    header("Location: index.php?mensaje");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">

        <table>
            <tr>
                <td>ID</td>
                <td>Nombre</td>
                <td>Apellido</td>
                <td>Dirección</td>
            </tr>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $nombre; ?></td>
                <td><?php echo $apellido; ?></td>
                <td><?php echo $direccion; ?></td>
            </tr>
        </table>

        <form action="" method="post">
            <input type="hidden" name="producto_id" value="<?php echo $id; ?>">
            <div>
                <label for="nuevoNombre">Nuevo Nombre:</label>
                <input type="text" name="nuevoNombre" value="<?php echo $nombre; ?>">
            </div>
            <div>
                <label for="nuevoPrecio">Nuevo Apellido:</label>
                <input type="text" name="nuevoApellido" value="<?php echo $apellido; ?>">
            </div>
            <div>
                <label for="nuevaDescripcion">Nueva Direccion:</label>
                <input type="text" name="nuevaDireccion" value="<?php echo $direccion; ?>">
            </div>
            <button type="submit" name="actualizar">Actualizar</button>
            <button type="submit" name="eliminar">Eliminar</button>

        </form>
        <a href="index.php">VOLVER</a>
    </div>
</body>

</html>