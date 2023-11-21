<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Conexion.php';

use Sergi\Tarea5\Conexion;
use \Milon\Barcode\DNS1D;

session_start();

$errores = [];
$nombre = '';
$apellidos = '';
$dorsal = '';
$posicion = '';
$codigoBarrasCompleto = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $apellidos = $_POST['apellidos'] ?? '';
    $dorsal = $_POST['dorsal'] ?? '';
    $posicion = $_POST['posicion'] ?? '';

    // Generar un número aleatorio de 12 dígitos para el código de barras
    $codigoBarras = mt_rand(100000000000, 999999999999);

    // Convertir el código de barras a cadena para el cálculo del dígito de verificación
    $codigoBarrasString = (string) $codigoBarras;

    // Calcular el dígito de verificación EAN-13
    $digitoVerificacion = calcularDigitoVerificacionEAN13($codigoBarrasString);

    // Crear el código de barras completo (12 dígitos + dígito de verificación)
    $barcode = $codigoBarrasString . $digitoVerificacion;

    // Imprime el código de barras para verificar
   // echo "Código de Barras: " . $barcode . "<br>";

    // Validaciones y procesamiento del formulario...

    // Si no hay errores y se presiona el botón "Crear Jugador"
    if (isset($_POST['crear_jugador'])) {
        // Insertar jugador en la base de datos
        Conexion::insertarJugador($nombre, $apellidos, $dorsal, $posicion, $barcode );
        header('Location: jugadores.php'); // Redirigir a la página de jugadores después de la inserción
        exit();
    }
}

include 'fcrear.php';

function calcularDigitoVerificacionEAN13($codigo)
{
    $sum = 0;
    for ($i = 0; $i < 12; $i++) {
        $sum += ($i % 2 == 0) ? (int) $codigo[$i] : (int) $codigo[$i] * 3;
    }
    $remainder = $sum % 10;
    if ($remainder === 0) {
        return 0;
    } else {
        return 10 - $remainder;
    }
}

?>
