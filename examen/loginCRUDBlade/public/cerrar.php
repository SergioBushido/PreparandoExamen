<?php
//Cerrar sesion con enlace
session_start();
session_destroy();
header("Location: login.php");
exit();