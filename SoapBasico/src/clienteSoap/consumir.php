<?php

require '../../vendor/autoload.php';

$url = 'http://localhost/examenTareas/SoapBasico/src/ServidorSoap/Servidor.php';
$uri = 'http://localhost/examenTareas/SoapBasico/src/ServidorSoap';
$paramSaludo = ['texto' => 'Sergio'];
$param = ['a' => 51, 'b' => 29];

try {
    $cliente = new \SoapClient(null, ['location' => $url, 'uri' => $uri, 'trace' => true]);
} catch (\SoapFault $ex) {
    echo "Error: " . $ex->getMessage();
}

$saludo = $cliente->__soapCall('saludo', $paramSaludo);
$suma = $cliente->__soapCall('suma', $param);
$resta = $cliente->__soapCall('resta', $param);

echo $saludo . " La suma es: $suma y la resta es: $resta";
