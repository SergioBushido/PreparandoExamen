<?php
require 'vendor/autoload.php';
use Sergi\Blade\Conexion;

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $muestra=$conexion->mostrar($id);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($muestra as $datos): ?>
            <tr>
            <td><input type="text" value="<?php echo $datos['Nombre']; ?>"></td>
                <td><input type="text" value="<?php echo $datos['Apellido']; ?>"></td>
                <td><input type="text" value="<?php echo $datos['Direccion']; ?>"></td>
                <td><a href="actualizar.php?id=<?php echo $datos['id']; ?>">Actualiza</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>