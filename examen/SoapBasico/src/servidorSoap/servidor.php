<?php

namespace Sergi\ServidorSoap;

class Operaciones
{
    public function resta($a, $b)
    {
        return $a - $b;
    }

    public function suma($a, $b)
    {
        return $a + $b;
    }

    public function saludo($texto)
    {
        return "Hola $texto";
    }
}
//Vigila la ruta si la movemos
$uri = 'http://localhost/examenTareas/examen/SoapBasico/src/ServidorSoap';
$parametros = ['uri' => $uri];

try {
    $server = new \SoapServer(null, $parametros);
    //namespace y el nombre de la clase
    $server->setClass('Sergi\ServidorSoap\Operaciones');
    $server->handle();
} catch (\SoapFault $f) {
    die("error en server: " . $f->getMessage());
}
