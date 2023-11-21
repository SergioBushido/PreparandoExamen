<?php
require 'vendor/autoload.php';
use Sergi\Blade\Conexion;

// Crear una instancia de la clase Conexion
$conexion = new Conexion();

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $muestra=$conexion->mostrar($id);

}


if(isset($_POST['update'])){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $id = $_POST['id'];  // Añadir esta línea

    $update = $conexion->actualizar($id, $nombre, $apellido, $direccion);

    header("Location: index.php");
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
   <form action="" method="POST">
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
            <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
            <td><input type="text" value="<?php echo $datos['Nombre']; ?>" name="nombre"></td>
            <td><input type="text" value="<?php echo $datos['Apellido']; ?>" name="apellido"></td>
            <td><input type="text" value="<?php echo $datos['Direccion']; ?>" name="direccion"></td>
            
            </tr>
            <input type="submit" name="update" value="Actualiza">
        <?php endforeach; ?>
    </tbody>
</table>
</form> 
</body>
</html>