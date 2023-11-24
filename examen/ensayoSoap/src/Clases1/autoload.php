<?php


 function autoload_bf14907d1cf3521923630c1fa17d522b($class)
{
    $classes = array(
        'Clases\Clases1\UltimaInformaticaService' => __DIR__ .'/UltimaInformaticaService.php',
        'Clases\Clases1\getMaterialInformaticoRequest' => __DIR__ .'/getMaterialInformaticoRequest.php',
        'Clases\Clases1\getMaterialInformaticoResponse' => __DIR__ .'/getMaterialInformaticoResponse.php',
        'Clases\Clases1\MaterialInformatico' => __DIR__ .'/MaterialInformatico.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_bf14907d1cf3521923630c1fa17d522b');

// Do nothing. The rest is just leftovers from the code generation.
{
}
