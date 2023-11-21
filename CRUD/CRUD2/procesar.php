<?php
require 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se está insertando un nuevo usuario
    if (isset($_POST['insertar'])) {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellido'];
        $direccion = $_POST['direccion'];

        // Preparar la consulta para insertar un nuevo usuario
        $consulta = $conexion->prepare("INSERT INTO datos_usuarios (Nombre, Apellido, Direccion) VALUES (:nombre, :apellido, :direccion)");
        $consulta->bindParam(":nombre", $nombre);
        $consulta->bindParam(":apellido", $apellidos);
        $consulta->bindParam(":direccion", $direccion);

        // Ejecutar la consulta de inserción
        if ($consulta->execute()) {
            header("Location: index.php"); // Redirigir al formulario principal si la inserción fue exitosa
        } else {
            echo "Error al insertar el usuario"; // Manejar errores de inserción si los hay
        }
    }

    // Verificar si se está actualizando un usuario existente
    elseif (isset($_POST['actualizar'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellido'];
        $direccion = $_POST['direccion'];

        // Preparar la consulta para actualizar un usuario existente
        $consulta = $conexion->prepare("UPDATE datos_usuarios SET Nombre = :nombre, Apellido = :apellido, Direccion = :direccion WHERE id = :id");
        $consulta->bindParam(":nombre", $nombre);
        $consulta->bindParam(":apellido", $apellidos);
        $consulta->bindParam(":direccion", $direccion);
        $consulta->bindParam(":id", $id);

        // Ejecutar la consulta de actualización
        if ($consulta->execute()) {
            header("Location: index.php"); // Redirigir al formulario principal si la actualización fue exitosa
        } else {
            echo "Error al actualizar el usuario"; // Manejar errores de actualización si los hay
        }
    }

    // Verificar si se está eliminando un usuario
    elseif (isset($_POST['eliminar'])) {
        $id = $_POST['id'];

        // Preparar la consulta para eliminar un usuario existente
        $consulta = $conexion->prepare("DELETE FROM datos_usuarios WHERE id = :id");
        $consulta->bindParam(":id", $id);

        // Ejecutar la consulta de eliminación
        if ($consulta->execute()) {
            header("Location: index.php"); // Redirigir al formulario principal si la eliminación fue exitosa
        } else {
            echo "Error al eliminar el usuario"; // Manejar errores de eliminación si los hay
        }
    }
}

// Si se proporciona un ID en la URL, cargar los datos del usuario para su edición
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = $conexion->prepare("SELECT id, Nombre, Apellido, Direccion FROM datos_usuarios WHERE id = :id");
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    $usuario = $consulta->fetch(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <!-- /Actualizar Usuarios -->
        <form action="procesar.php" method="post">
            <input type="hidden" name="id" value="<?php echo isset($usuario['id']) ? $usuario['id'] : ''; ?>">
            
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo isset($usuario['Nombre']) ? $usuario['Nombre'] : ''; ?>" required><br>
            
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellido" value="<?php echo isset($usuario['Apellido']) ? $usuario['Apellido'] : ''; ?>" required><br>
            
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" value="<?php echo isset($usuario['Direccion']) ? $usuario['Direccion'] : ''; ?>" required><br>
            
            <?php if (isset($_GET['id'])): ?>
                <button type="submit" name="actualizar">Actualizar</button>
            <?php else: ?>
                <button type="submit" name="insertar">Insertar</button>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>