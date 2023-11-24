<?php
// URL del servicio web y espacio de nombres
$url = 'http://localhost/examenTareas/examen/soapAbaseDatos/servidorSoap/servicio.php';
$uri = 'http://localhost/examenTareas/examen/soapAbaseDatos/servidorSoap';


try {
    // Crear un cliente SOAP
    $cliente = new SoapClient(null, ['location' => $url, 'uri' => $uri]);
} catch (SoapFault $f) {
    // Manejar errores en la creación del cliente SOAP
    die("Error en cliente SOAP:" . $f->getMessage());
}

// Llamadas a las operaciones del servicio web


//$familias = $cliente->__soapCall('getFamilias', []);
//$productos = $cliente->__soapCall('getProductosFamilia', ['codF' => $codF]);
//$unidades = $cliente->__soapCall('getStock', ['codP' => $codP, 'codT' => $codT]);
$unidades = $cliente->__soapCall('mostrarInfo', []);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <!-- Tabla para mostrar resultados -->
  

    <!-- Lista de códigos de familias -->
    <h2>Códigos por Familias</h2>
    <ul>
        <?php foreach ($unidades as $k) : ?>
            <li><code><?php echo $k->nombrec; ?></code></li>
        <?php endforeach; ?>
    </ul>

   

  
</body>

</html>
