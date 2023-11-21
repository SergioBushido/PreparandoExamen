<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Personal</title>
     <!-- Boostrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['nombre']) || empty($_SESSION['nombre'])){
    // Si no ha iniciado sesión, redirigir al usuario a la página de inicio de sesión
    header("Location: login.php");
    exit(); // Asegurar que el script se detenga después de la redirección
}
?>

<h1>Área Personal</h1>
  <!--<p>
    Bienvenido: <?= $_SESSION['nombre']; ?>
</p>
<form action="cerrar.php" method="post">
    <input type="submit"  class="btn btn-primary" name="cerrar_sesion" value="Cerrar Sesión">
</form>
-->

<a class="btn btn-primary" href="cerrar.php">Cerrar sesion</a>
</body>
</html>
