<?php
require('conexion.php');

if (isset($_POST['eliminar'])) {
    // Obtener el ID del producto a eliminar
    $producto_id = $_POST['producto_id'];

    // Realizar la consulta para eliminar el producto
    $consulta = "DELETE FROM productos WHERE id=$producto_id";
    if ($conProyecto->query($consulta) === TRUE) {
        
// Después de una eliminación exitosa
header("Location: listado.php?success=eliminar");
exit();
        
    } else {
        echo "Error al eliminar el producto: " . $conProyecto->error;
    }

    // Cerrar la conexión a la base de datos
    cerrarConexion();
}
?>
