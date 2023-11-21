<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Sergi\Tarea5\Conexion;
use \Milon\Barcode\DNS1D;

$d = new DNS1D();
$d->setStorPath(__DIR__.'/cache/');

// Obtener los datos de los jugadores desde la base de datos
$jugadores = Conexion::obtenerJugadores();





// Incluir la vista de los jugadores (con estilos Bootstrap) y pasar el arreglo de jugadores como variable
include '../views/vjugadores.php';
?>
