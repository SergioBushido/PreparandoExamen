<?php
require '../vendor/autoload.php';

use Clases\Clases1\UltimaInformaticaService;
use Clases\Clases1\getMaterialInformaticoRequest;

// Instancia de la clase generada para interactuar con el servicio
$cliente = new UltimaInformaticaService();

// Código del material informático que deseas obtener
$materialId = 5;

// Crear la solicitud usando la clase generada
$request = new getMaterialInformaticoRequest($materialId);

try {
    // Llamar a la operación del servicio
    $response = $cliente->getMaterialInformatico($request);

    // Obtener el objeto MaterialInformatico de la respuesta
    $material = $response->getMaterial();

    // Realizar operaciones con los datos obtenidos
    $materialId = $material->getId();
    $nombre = $material->getNombre();
    $descripcion = $material->getDescripcion();

    // Aquí puedes realizar cualquier otra operación con los datos obtenidos

} catch (SoapFault $f) {
    die("Error en cliente SOAP:" . $f->getMessage());
}

// Ahora puedes utilizar los datos obtenidos para generar tu salida HTML, similar al ejemplo proporcionado.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tu estilo CSS aquí -->
</head>

<body>
    <h1>Material Informático</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td><?php echo $materialId; ?></td>
            <td><?php echo $nombre; ?></td>
            <td><?php echo $descripcion; ?></td>
        </tr>
    </table>

    <!-- Agrega aquí el resto de tu HTML según sea necesario -->

</body>

</html>

