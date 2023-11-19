<?php
session_start();
require '../vendor/autoload.php';

use Philo\Blade\Blade;
use Sergi\Conexion;

//hay que mirar porque no tenemos la conexion directamente con el constructor
$conexion = new Conexion();
//$con = $conexion->obtenerConexion();

$views = '../views';
$cache = '../cache';
$blade = new Blade($views, $cache);

$titulo = 'Login';
$encabezado = 'Introduzca Nombre y Contraseña';

//Si se pulsa el boton de Login del formulario html
if (isset($_POST['login'])) {
    try {
        //Capturamos nombre y contraseña y asocioamos a una variable
        //en esta app el nombre es gestor y la contraseña pass
        $login = $_POST['usuario']; //capturamos name= usuario
        $pass = $_POST['pass'];//capturamos name=pass
        //La contraseña que introduce el usuario se pasa a hash
        //para poder compararla con la de la BBDD
        $hashedPasswordUsuario = hash('sha256', $pass);
        
        //Variable con la consulta
        $sql = "SELECT * FROM usuarios WHERE usuario=:u AND pass=:p";
        
        $result = $conexion->obtenerConexion()->prepare($sql);
     
        //UTILIZANDO array asociativo como argumento al método 
        $result->execute([
            ':u' => $login,
            ':p' => $hashedPasswordUsuario
        ]);
        
        //Si la búsqueda tiene más de una fila es que hay éxito
        if ($result->rowCount() == 1) {
            //Si hay éxito creamos una sesión llamada nombre que contiene el valor de la 
            //variable login (nombre que mete usuario) y nos lleva a listado.php
            $_SESSION['nombre'] = $login;
            header("Location: listado.php");
            exit();
        } else {
            //Si no hay éxito nos crea una sesión 'error' que almacena un mensaje
            $_SESSION['error'] = "Nombre de usuario o contraseña incorrecta"; //este mensaje se captura al final del código
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } finally {
        $conexion->cerrarTodo($result);
    }
}

$conexion = $conexion->obtenerProductos();

echo $blade->view()->make('vistaLogin', compact('titulo', 'encabezado', 'conexion'))->render();
?>
