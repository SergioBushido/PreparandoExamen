<?php
session_start(); // Inicia la sesión (asegúrate de hacerlo al inicio de tu script)

require '../vendor/autoload.php';
use Sergi\Login;
use Philo\Blade\Blade;
    
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Login';
$encabezado = 'Identificate';



if (isset($_POST['nombre']) && isset($_POST['pass'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $login=new Login();
    $login->log($nombre, $pass);


}
echo $blade->view()->make('vlogin', compact('titulo', 'encabezado'))->render();
?>



