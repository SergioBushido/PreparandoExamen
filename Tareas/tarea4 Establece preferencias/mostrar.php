<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body class="container mt-5">
    <?php
    session_start();

    // Verifica si las preferencias están establecidas en la sesión
    if (isset($_SESSION['idioma']) && isset($_SESSION['perfil']) && isset($_SESSION['zona_horaria'])) {
        $idioma = $_SESSION['idioma'];
        $perfil = $_SESSION['perfil'];
        $zona_horaria = $_SESSION['zona_horaria'];
    } else {
        // Si las preferencias no están establecidas, muestra un mensaje y redirige a preferencias.php
        echo '<h2 class="text-danger">Debes fijar primero las preferencias</h2>';
        echo '<a href="preferencias.php" class="btn btn-primary mt-3">Establecer preferencias</a>';
        die(); // Detiene la ejecución del script
    }
    ?>

    <h2 class="text-success">Preferencias</h2>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Idioma: <?= ucfirst($idioma) ?></h5>
            <h5 class="card-title">Perfil Público: <?= ucfirst($perfil) ?></h5>
            <h5 class="card-title">Zona Horaria: <?= $zona_horaria ?></h5>
        </div>
    </div>

    <form action="mostrar.php" method="post">
        <button type="submit" class="btn btn-primary mt-3" name="setPreferences">Establecer</button>
        <button type="submit" class="btn btn-danger mt-3 ml-2" name="deletePreferences">Borrar</button>
    </form>

    <?php
    // Verifica si se hizo clic en el botón "Establecer"
    if (isset($_POST['setPreferences'])) {
        // Redirige a preferencias.php para permitir al usuario establecer nuevas preferencias
        header("Location: preferencias.php");
        exit();
    }

    // Verifica si se hizo clic en el botón "Borrar"
    if (isset($_POST['deletePreferences'])) {
        // Elimina las preferencias de la sesión
        unset($_SESSION['idioma']);
        unset($_SESSION['perfil']);
        unset($_SESSION['zona_horaria']);
        echo '<p class="text-success mt-3">Preferencias Borradas.</p>';
    }
    ?>

</body>

</html>
