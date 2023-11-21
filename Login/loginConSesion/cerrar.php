<?php
//Cerrar sesion con enlace
session_start();
session_destroy();
header("Location: login.php");
exit();

//Cerrar sesion a travez de formulario
/*
if(isset($_POST['cerrar_sesion'])){
    session_destroy();
    header("Location:login.php");
    exit();
}*/
