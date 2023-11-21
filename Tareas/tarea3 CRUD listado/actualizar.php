<?php
include('conexion.php'); // Incluye el archivo de conexión

// Verificar si se ha enviado el formulario de actualización
if (isset($_POST['actualizar'])) {
    // Obtener el ID del producto desde el formulario oculto
    $producto_id = $_POST['producto_id'];

    // Obtener los nuevos valores desde el formulario editable (asegúrate de sanitizar los datos)
    $nuevoNombre = mysqli_real_escape_string($conProyecto, $_POST['nuevoNombre']);
    $nuevoPrecio = mysqli_real_escape_string($conProyecto, $_POST['nuevoPrecio']);
    $nuevaDescripcion = mysqli_real_escape_string($conProyecto, $_POST['nuevaDescripcion']);
    $nuevoTipo = mysqli_real_escape_string($conProyecto, $_POST['nuevoTipo']);

    // Realizar la actualización en la base de datos usando el ID del producto
    $consulta = "UPDATE productos SET nombre='$nuevoNombre', pvp='$nuevoPrecio', descripcion='$nuevaDescripcion', tipo='$nuevoTipo' WHERE id=$producto_id";

    if ($conProyecto->query($consulta) === TRUE) {
        // Actualización exitosa, redirigir a la página de detalles con el ID del producto y mensaje de éxito
header("Location: listado.php?success=actualizar");
exit();


        
    } else {
        // Error en la actualización, puedes manejar el error como desees
        echo "Error al actualizar el producto: " . $conProyecto->error;
    }

    // Cerrar la conexión a la base de datos
    cerrarConexion();
} else {
    // Si no se ha enviado el formulario de actualización, redirigir a la página de detalles sin éxito
    header("Location: detalle.php");
    exit();
}
?>
