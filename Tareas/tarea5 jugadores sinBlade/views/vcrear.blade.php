
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Jugador</title>
    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FF8A65; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Crear Jugador</h1>

        <!-- Formulario para crear un nuevo jugador -->
        <form action="crearJugador.php" method="POST">
            <!-- Campo Nombre -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo isset($nombre) ? $nombre : ''; ?>" required>
            </div>

            <!-- Campo Apellidos -->
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo isset($apellidos) ? $apellidos : ''; ?>" required>
            </div>

            <!-- Campo Dorsal -->
            <div class="form-group">
                <label for="dorsal">Dorsal:</label>
                <input type="number" class="form-control" id="dorsal" name="dorsal" value="<?php echo isset($dorsal) ? $dorsal : ''; ?>" required>
            </div>

            <!-- Campo Posición -->
            <div class="form-group">
                <label for="posicion">Posición:</label>
                <select class="form-control" id="posicion" name="posicion" required>
                    <option value="Portero" <?php echo (isset($posicion) && $posicion === 'Portero') ? 'selected' : ''; ?>>Portero</option>
                    <option value="Defensa" <?php echo (isset($posicion) && $posicion === 'Defensa') ? 'selected' : ''; ?>>Defensa</option>
                    <option value="Lateral Izquierdo" <?php echo (isset($posicion) && $posicion === 'Lateral Izquierdo') ? 'selected' : ''; ?>>Lateral Izquierdo</option>
                    <option value="Lateral Derecho" <?php echo (isset($posicion) && $posicion === 'Lateral Derecho') ? 'selected' : ''; ?>>Lateral Derecho</option>
                    <option value="Central" <?php echo (isset($posicion) && $posicion === 'Central') ? 'selected' : ''; ?>>Central</option>
                    <option value="Delantero" <?php echo (isset($posicion) && $posicion === 'Delantero') ? 'selected' : ''; ?>>Delantero</option>
                </select>
            </div>

            <div class="form-group">
            <label for="codigo_barras" name="generar_codigo">Número Aleatorio:</label>
            <?php echo isset($barcode ) ? $barcode  : ''; ?>
            </div>

            <!-- Botón para generar nuevo número aleatorio -->
            <button type="submit" class="btn btn-primary " name="generar_codigo">Generar Barcode</button>

            <!-- Botón para enviar el formulario -->
            <button type="submit" class="btn btn-success" name="crear_jugador">Crear</button>
          
            <!-- Botón para limpiar el formulario sin JavaScript -->
            <button type="reset" class="btn btn-warning">Limpiar Formulario</button>

             <!-- Botón para volver a http://localhost/tarea5/public/jugadores.php -->
             <a href="http://localhost/tarea5/public/jugadores.php" class="btn btn-primary">Volver</a>
             <div class="mt-4"></div>
             
           


        </form>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



