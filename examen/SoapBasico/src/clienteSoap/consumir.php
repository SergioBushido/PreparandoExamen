<?php

require '../../vendor/autoload.php';
$uri = 'http://localhost/examenTareas/examen/SoapBasico/src/ServidorSoap';
$url = $uri.'/Servidor.php';

$paramSaludo = ['texto' => 'Sergio'];
$param = ['a' => 2, 'b' => 2];

try {
    $cliente = new \SoapClient(null, ['location' => $url, 'uri' => $uri, 'trace' => true]);
} catch (\SoapFault $ex) {
    echo "Error: " . $ex->getMessage();
}

$saludo = $cliente->__soapCall('saludo', $paramSaludo);
$suma = $cliente->__soapCall('suma', $param);
$resta = $cliente->__soapCall('resta', $param);

echo $saludo . " La suma es: $suma y la resta es: $resta";
