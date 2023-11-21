<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Sergi\Tarea5\Conexion;

// Verificar si la tabla jugadores tiene datos
if (Conexion::hayJugadores()) {
    // Si hay datos, redirigir a jugadores.php
    header('Location: jugadores.php');
    exit();
} else {
    // Si no hay datos, cargar instalacion.php para crear datos de ejemplo
    header('Location: instalacion.php');
    exit();
}
?>
