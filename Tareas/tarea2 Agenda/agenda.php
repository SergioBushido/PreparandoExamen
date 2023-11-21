<!doctype html>
<html lang="es">
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
session_start();
//Mensajes de error que capturamos de la URL cuando pulsamos enviar sin meter el nombre
if(isset($_GET['error'])){
    $error = $_GET['error'];
    //operador ternario, si no hay un nombre entra cadena vacia
    //estamos capturando el nombre, por si despues queremos implemtar el mensaje de error
    //cuando intenta mandar el formulario con el nombre pero sin el telefono
    $nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
    if($error == 1){
        echo '<p class="error">El campo Nombre es obligatorio!!!</p>';
    //si por la url va un nombre pero con error=2 va ese mensaje
    //Por eso el nombre lo pillamos con el ternario
    } elseif($error == 2) {
        echo '<p class="error">El campo Teléfono es obligatorio para el nombre: ' . $nombre . '!!!</p>';
    }
}

// Si hemos pulsado vaciar recibimos en el formulario <input type="hidden" name="vaciar" value="true"
//y mete un array vacio ( se hace para que no se mostren los datos superiores e inferiores de la agenda)
if(isset($_GET['vaciar'])){
    $_SESSION['agenda'] = array(); // Vacía la agenda
    echo '<p class="mensaje">Todos los contactos han sido eliminados.</p>';
}
?>


<h1>Agenda</h1>

<?php
// Muestra los contactos en "Datos Agenda" cuando almenos hay un contacto
//si se da a vaciar count sera 0 y no mostrara los datos superiores e inferiores
if(isset($_SESSION['agenda']) && count($_SESSION['agenda']) > 0){
    echo '<fieldset class="campo">';
    echo '<legend>Datos Agenda</legend>';
    foreach($_SESSION['agenda'] as $contacto){
        echo '<p>'. $contacto['nombre'] ."&nbsp;&nbsp" . "<span>". $contacto['telefono'] ."</span>". '</p>';
    }
    echo '</fieldset>';
}

//Si hicieramos todo el codigo junto en un unico ponemos
//<form action="<?php echo $_SERVER['PHP_SELF']; 
?>

<form action="proc/procesos.php" method="GET">
    <fieldset class="campo">
        <legend>Nuevo Contacto</legend>
        <p>Nombre:&nbsp <input type="text" name="nombre"  /></p>
        <p>Teléfono: <input type="text" name="telefono" /></p>

        <input type="submit" value="Añadir Contacto" name="enviar" />&nbsp;&nbsp;
        <input type="reset" value="Limpiar Campos" />
    </fieldset>
</form>

<?php
// Muestra la parte de abajo del formulario cuando hay 1 contacto para poder vaciar la agenda
if(isset($_SESSION['agenda']) && count($_SESSION['agenda']) > 0){
    echo '<fieldset class="campo">';
    echo '<legend>Vaciar Agenda</legend>';
    echo '<form action="agenda.php" method="GET">';
    echo '<input type="hidden" name="vaciar" value="true" />';
    echo '<input type="submit" value="Vaciar" />';
    echo '</form>';
    echo '</fieldset>';
}
?>

</body>
</html>
