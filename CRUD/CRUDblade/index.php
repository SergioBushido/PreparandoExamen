<?php

require 'vendor/autoload.php';

use Sergi\Blade\Conexion;

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

// Obtener datos de usuarios
$datosUsuarios = $conexion->obtenerDatosUsuarios();


// Cerrar la conexión
$conexion->cerrarConexion();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<?php if (empty($datosUsuarios)): ?>
    <p>No hay ningún usuario.</p>
    <td><a href="insertar.php">Insertar</a></td>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datosUsuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['Nombre']; ?></td>
                    <td><?php echo $usuario['Apellido']; ?></td>
                    <td><?php echo $usuario['Direccion']; ?></td>
                    <td><a href="eliminar.php?id=<?php echo $usuario['id']; ?>">Eliminar</a></td>
                    <td><a href="mostrar.php?id=<?php echo $usuario['id']; ?>">mostrar</a></td>
                    <td><a href="actualizar.php?id=<?php echo $usuario['id']; ?>">Actualizar</a></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <td><a href="insertar.php">Insertar</a></td>
<?php endif; ?>
    
</body>
</html>