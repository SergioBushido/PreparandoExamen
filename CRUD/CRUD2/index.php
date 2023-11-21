<?php
require 'conexion.php';

// Obtener datos de la base de datos y asignarlos a la variable $usuarios
$consulta = $conexion->prepare("SELECT id, Nombre, Apellido, Direccion FROM datos_usuarios");
$consulta->execute();
$usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>CRUD de Usuarios</h1>

       <!-- Formulario para Insertar/Actualizar Usuarios -->
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


        <!-- Lista de Usuarios -->
        <h2>Lista de Usuarios</h2>
        <ul>
            <?php foreach ($usuarios as $usuario): ?>
                <li>
                    <?php echo $usuario['Nombre'] . ' ' . $usuario['Apellido'] . ' - ' . $usuario['Direccion']; ?>
                    <a href="procesar.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    <form action="procesar.php" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
                        <button type="submit" name="eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">Eliminar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
