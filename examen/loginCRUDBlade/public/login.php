<?php
session_start(); // Iniciamos  la sesión 

require '../vendor/autoload.php';
use Sergi\Login;
use Philo\Blade\Blade;
    
$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Login';
$encabezado = 'LOGIN';



if (isset($_POST['nombre']) && isset($_POST['pass'])) {
    //Verificamos el login (si tiene hash)
    $nombre = $_POST['nombre'];
    $pass = $_POST['pass'];
    $hash=hash('sha256', $pass);
    $login=new Login();
    $login->log($nombre, $hash);

     
     //Verificamos el login SIN HASH
    /* $nombre = $_POST['nombre'];
     $pass = $_POST['pass'];
     $login=new Login();
     $login->log($nombre, $pass);*/


}


echo $blade->view()->make('vlogin', compact('titulo', 'encabezado'))->render();
?>



