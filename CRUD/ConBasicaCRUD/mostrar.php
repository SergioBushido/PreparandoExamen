<?php
require 'conexion.php';
session_start();

// Verificar si no hay sesión, redirigir a la página de login
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$conexion = new Conexion();
$datosProductos = $conexion->obtenerDatosProductos();

if (isset($_POST['insertar'])){
    $nombre=$_POST['nom'];
    $descripcion=$_POST['des'];
    $pvp=$_POST['pvp'];

    $sql = "INSERT INTO productos (nombre, descripción, pvp) VALUES (?, ?, ?)";
    $stm = $conexion->obtenerConexion()->prepare($sql);

    $stm->bindParam(1, $nombre);
    $stm->bindParam(2, $descripcion);
    $stm->bindParam(3, $pvp);

    $stm->execute();

    header("Location: mostrar.php");
    exit();
}


if (isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nom'];
    $descripcion = $_POST['des'];
    $pvp = $_POST['pvp'];

    $sql = "UPDATE productos SET nombre=?, descripción=?, pvp=? WHERE id=?";
    $stm = $conexion->obtenerConexion()->prepare($sql);
    $stm->bindParam(1, $nombre);
    $stm->bindParam(2, $descripcion);
    $stm->bindParam(3, $pvp);
    $stm->bindParam(4, $id);
    $stm->execute();
    header("Location: mostrar.php");
    exit();
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
    <h1>Bienvenido <?php echo $_SESSION['usuario']?></h1>

    <?php 
   
    // Hacer algo con $datosProductos, por ejemplo, imprimir o procesar
    foreach ($datosProductos as $producto) {
        echo "Nombre: " . $producto['nombre'] . ", Descripción: " . $producto['descripción'] .
         ", Precio: " . $producto['pvp'] . "<a href='mostrar.php?id=" . $producto['id'] . "'>Eliminar</a>
         <a href='mostrar.php?actualizar=" . $producto['id'] . "'>Actualizar</a><br>";
    
}

    //En otro momento crea una función de esto
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql = "DELETE from productos WHERE id = :id";
        $stm = $conexion->obtenerConexion()->prepare($sql);
        $stm->bindParam(":id" , $id);
        $stm->execute();
        header("Location: mostrar.php");
        exit();
    }

    ?>

    <?php if(isset($_GET['actualizar'])) {?>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            Nombre: <input type="text" name="nom" value="<?php echo $producto['nombre']; ?>">
            Descripción: <textarea name="des"><?php echo $producto['descripción']; ?></textarea>
            PVP: <input type="number" name="pvp" value="<?php echo $producto['pvp']; ?>">
            <input type="submit" value="actualizar" name="actualizar">
            <a href="mostrar.php">Volver</a>
        </form>
    <?php } else { ?>
        <form action="" method="POST">
            Nombre: <input type="text" name="nom">
            Descripción: <textarea name="des"></textarea>
            PVP: <input type="number" name="pvp">
            <input type="submit" value="insertar" name="insertar">
        </form>
    <?php } ?>
</body>
</html>
