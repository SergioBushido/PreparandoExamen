<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="es">

<head>
    <!-- Agrega enlaces a Bootstrap y otros archivos de estilo aquí si es necesario -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Tu Cesta</title>
</head>

<body style="background: gray;">
    <div class="container mt-5">
        <div class="float-right mb-3">
            <a href="listado.php" class="btn btn-primary mr-2">Volver a la Tienda</a>
            <a href="pagar.php" class="btn btn-danger">Pagar</a>
        </div>

        <h2 class="mb-4">Tu Cesta de Compras</h2>

        <?php
        if (isset($_SESSION['cesta'])) {
            $total = 0;
        ?>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio (€)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //recorremos el array cesta para ver lo que tiene almacenado
                    foreach ($_SESSION['cesta'] as $producto) {
                    ?>
                        <tr>
                            <td><?php echo $producto['nombre']; ?></td>
                            <td><?php echo $producto['pvp']; ?></td>
                        </tr>
                    <?php
                        $total += $producto['pvp'];
                    }
                    ?>
                </tbody>
            </table>

            <hr style='border:none; height:2px; background-color: white;'>

            <h4>Total: <?php echo $total; ?> €</h4>

        <?php
        } else {
            echo "<p class='card-text'>Tu carrito está vacío.</p>";
        }
        ?>
    </div>
</body>

</html>

