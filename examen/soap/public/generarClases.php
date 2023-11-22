<?php
require '../vendor/autoload.php';

use Wsdl2PhpGenerator\Generator;
use Wsdl2PhpGenerator\Config;

$generator = new Generator();
$generator->generate(
    new Config([
        'inputFile' => 'http://localhost/examenTareas/examen/soap/servidorSoap/servicio.wsdl',
        'outputDir' => '../src/Clases1',
        'namespaceName' => 'Clases\Clases1'
    ])
);

// Nota: Este proceso debe realizarse solo una vez, similar a la generación del WSDL.
