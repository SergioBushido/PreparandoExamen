<?php

$dbname="pruebacontraseñas";
$user="root";
$pass="";
$host="localhost";


try{
    $conexion=new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}



?>