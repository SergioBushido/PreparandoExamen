<?php
session_start();

if (isset($_POST['nombre']) || isset($_POST['modulo'])) {
    $nombre = $_POST['nombre'];
    $modulos = isset($_POST['modulo']) ? $_POST['modulo'] : [];

    $_SESSION['nombre'] = $nombre;
    $_SESSION['modulos'] = $modulos;

    header('Location: ejercicioResuelto5.php');
    exit();
} else {
    header('Location: ejercicioResuelto5.php');
    exit();
}
?>