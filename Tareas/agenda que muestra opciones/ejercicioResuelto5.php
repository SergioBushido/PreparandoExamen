<!doctype html>
<html lang="es">
<head>
    <!-- Encabezado del documento -->
</head>

<body style="background: #FA8072">
    <form action="procesa.php" method="POST">
        <fieldset style="width:40%; margin:auto">
            <legend style="font-weight: bold">Nuevo Contacto</legend>
            <p>Nombre:&nbsp<input type="text" name="nombre" placeholder="Nombre" /></p>
            <fieldset style="width:50%">
                <legend style="font-weight: bold">Elige Módulos</legend>
                <p><input type="checkbox" name="modulo[]" value="DWESE" />&nbsp;Desarrollo Web en Entorno Servidor.</p>
                <p><input type="checkbox" name="modulo[]" value="DWEC" />&nbsp;Desarrollo Web en Entorno Cliente.</p>
            </fieldset>
            <div style="text-align: center; margin-top: 5px">
                <input type="submit" value="Enviar" name="enviar" />&nbsp;&nbsp;
                <input type="reset" value="Limpiar" />
            </div>
        </fieldset>
        
    </form>
    <?php

    //abrimos sesion para tener acceso a las varibles declaradas en procesa.php
session_start();



//si existen las variables de sesion nombre y modulos las asignamos a una varible para 
//posterior manejo
if(isset($_SESSION['nombre']) && isset($_SESSION['modulos'])){
    $nombre = $_SESSION['nombre'];
    $modulos = $_SESSION['modulos'];
    $totalModulos = count($_SESSION['modulos']); 

    echo "<h2>Nombre: " . htmlspecialchars($nombre) . "</h2>";
    echo "<br>Has elegido un total de: $totalModulos módulos";
    //si hay checkbox seleccionado
    if(!empty($modulos)){
        //creamos una lista desordenada
        echo "<h2>Módulos Seleccionados:</h2>";
        echo "<ul>";
        //recorremos el array modulos que nos ofrecerá las casillas marcadas
        foreach($modulos as $modulo){
            echo "<li>" . htmlspecialchars($modulo) . "</li>";
        }
        echo "</ul>";
       
    } else {
        echo "<h2>Ningún módulo seleccionado.</h2>";
    }
} else {
    echo "<h2>Nombre no disponible</h2>";
}

/*
echo "Tu nombre es: {$_POST['nombre']}";
     $totalModulos = 0;
     //comprobamos si nos ha llegado algún módulo
     if (isset($_POST['modulo'])) {
        $totalModulos = count($_POST['modulo']); //los contamos
         echo "<br>Los módulos elegidos han sido: ";
         echo "<ol>";
        foreach ($_POST['modulo'] as $v) { //los recorremos y mostramos
            echo "<li>$v</li>";
        }
        echo "</ol>";
    }
    echo "<br>Has elegido un total de: $totalModulos módulos";

*/


?>


    
</body>
</html>
