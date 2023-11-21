<?php
require('conexion.php'); // Incluye el archivo de conexión

// Verificar si se ha enviado el formulario de creación
if (isset($_POST['accion_crear'])) {
    // Obtener los datos del formulario
    $nuevoNombre = mysqli_real_escape_string($conProyecto, $_POST['nuevoNombre']);
    $nuevoPrecio = mysqli_real_escape_string($conProyecto, $_POST['nuevoPrecio']);
    $nuevaDescripcion = mysqli_real_escape_string($conProyecto, $_POST['nuevaDescripcion']);
    $nuevoTipo = mysqli_real_escape_string($conProyecto, $_POST['nuevoTipo']);

    // Insertar el nuevo producto en la base de datos
    $consulta = "INSERT INTO productos (nombre, pvp, descripcion, tipo) VALUES ('$nuevoNombre', '$nuevoPrecio', '$nuevaDescripcion', '$nuevoTipo')";

    if ($conProyecto->query($consulta) === TRUE) {
        // Redirigir a la misma página después de la creación
// Después de una creación exitosa
header("Location: listado.php?success=crear");
exit();

    } else {
        // Si ocurre un error durante la inserción, puedes mostrar un mensaje de error
        echo "Error al agregar el producto: " . $conProyecto->error;
    }

    // Cerrar la conexión
    cerrarConexion();
}
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Enlaces a Bootstrap CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

    <title>Tarea Tema 3</title>
  <!-- Estilos CSS similares a bootstrap 
  <link rel="stylesheet" href="CSS/styles.css"> -->
    
</head>

<body>
    <div class="container mt-5">
        <!-- Div para mostrar el formulario de creación de productos -->
        <div id="formularioCrear">
            <h4 class="mb-3">Crear Nuevo Producto</h4>
            <form action="crear.php" method="POST">
                <div class="form-group row">
                    <label for="nuevoNombre" class="col-sm-2 col-form-label">Nombre del Producto:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nuevoPrecio" class="col-sm-2 col-form-label">Precio:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nuevoPrecio" name="nuevoPrecio" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nuevaDescripcion" class="col-sm-2 col-form-label">Descripción:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nuevaDescripcion" name="nuevaDescripcion" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nuevoTipo" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nuevoTipo" name="nuevoTipo" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                
                    
                </div>
            </form>
        </div>
    </div>
</body>

</html>
