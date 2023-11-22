<?php

require '../vendor/autoload.php';

use Clases\Categorias;
use Philo\Blade\Blade;

$views = '../views';
$cache = '../cache';

$blade = new Blade($views, $cache);
$titulo = 'Familias';
$encabezado = 'Listado de categorias';
$categorias = (new Categorias())->recuperarCategorias();
echo $blade
    ->view()
    ->make('vistaCategorias', compact('titulo', 'encabezado', 'categorias'))
    ->render();