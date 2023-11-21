<?php
require_once __DIR__ . '/../vendor/autoload.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Jugadores</title>
    <!-- Estilos Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FF8A65; 
        }

        .fila-gris {
            background-color: #343A40;
            color: white; 
        }

        .fila-gris-claro {
            background-color: #3E444A;
            color: white; 
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Listado de Jugadores</h1>
        <table class="table table-bordered" >
            <thead class="fila-gris">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Dorsal</th>
                    <th>Posición</th>
                    <th>Barcode</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($jugadores as $jugador): ?>
                    <tr class="fila-gris">
                        <td><?php echo $jugador['id']; ?></td>
                        <td><?php echo $jugador['nombre']; ?></td>
                        <td><?php echo $jugador['apellidos']; ?></td>
                        <td><?php echo ($jugador['dorsal'] ? $jugador['dorsal'] : 'Sin asignar'); ?></td>
                        <td><?php echo $jugador['posicion']; ?></td>
                        <td><?php echo $d->getBarcodeHTML($jugador['barcode'], 'EAN13');?></td>
                    </tr>
                <?php endforeach; ?>
               
            </tbody>
        </table>
        <br>
        <a href="../public/crearjugador.php" class="btn btn-primary">Nuevo Jugador</a>
    </div>

    <!-- Scripts Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
