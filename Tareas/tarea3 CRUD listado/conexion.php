<?php
// Establecemos la conexión con la base de datos usando mysqli en modo orientado a objetos
$conProyecto = new mysqli('localhost', 'root', '', 'empresa');

// Verificamos si hay errores en la conexión
if ($conProyecto->connect_error) {
    // Si hay errores, mostramos un mensaje y terminamos el script
    die('Error de Conexión (' . $conProyecto->connect_errno . ') ' . $conProyecto->connect_error);
}

// Función para cerrar la conexión a la base de datos
function cerrarConexion()
{
    global $conProyecto;
    // Cerramos la conexión
    $conProyecto->close();
}
?>
