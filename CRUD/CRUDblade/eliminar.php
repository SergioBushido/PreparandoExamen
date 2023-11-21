<?php
require 'vendor/autoload.php';
use Sergi\Blade\Conexion;

// Crear una instancia de la clase Conexion
$conexion = new Conexion();


if($_GET['id']){

    $id=$_GET['id'];

    $elimina=$conexion->eliminar($id);

    header("Location: index.php");



}
