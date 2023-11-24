<?php
session_start(); // Inicia la sesión (asegúrate de hacerlo al inicio de tu script)

require '../vendor/autoload.php';
use Sergi\Login;
use Philo\Blade\Blade;
    
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Login';
$encabezado = 'LOGIN';



if (isset($_POST['nombre']) && isset($_POST['pass'])) {
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    //si no usamos hash comentamos lo de abajo y en lugar de $hash en parametro ponemos $pass
    $hash=hash('sha256', $pass);
    $login=new Login();
    $login->log($nombre, $hash);


}
echo $blade->view()->make('vlogin', compact('titulo', 'encabezado'))->render();
?>



