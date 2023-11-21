<?php
require 'conexion.php';

if (isset($_GET['mensaje'])) {
    echo "<h2>Usuario Insertado</h2>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
    <div class="container">

        <h1>Datos de los usuarios</h1>

        <form action="actualiza.php" method="POST">
            <select name='datos'>
                <?php
                // Consulta para Mostrar los datos da la tabla
                $consulta = $conexion->prepare("SELECT id, Nombre, Apellido, Direccion FROM datos_usuarios");
                $consulta->execute();

                // Mostrar los datos en la tabla
                while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {

                    echo "<option  value='{$fila['id']}'>" . ($fila['Nombre']) . ($fila['Apellido']) . ($fila['Direccion']) . "</option>";
                }
                ?>

            </select>
            <input type="submit" name="enviar">
            <hr>
            </br>
            <table>
                <tr>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Dirección</td>
                </tr>
                <tr>
                    <td>Nombre: <input type="text" name="nuevo_nombre"></td>
                    <td>Apellido : <input type="text" name="nuevo_apellido"></td>
                    <td>Dirección: <input type="text" name="nueva_direccion"></td>
                </tr>
                </br>

                </br>

                </br>


                <input type="submit" name="insertar" value="insertar">
            </table>

        </form>


    </div>
</body>

</html>