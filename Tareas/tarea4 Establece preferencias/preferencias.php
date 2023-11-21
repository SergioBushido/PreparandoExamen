<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferencias del Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body class="container mt-5">
    <?php
    session_start();

    // Verifica si las preferencias están establecidas en la sesión
    $idioma = $_SESSION['idioma'] ?? '';
    $perfil = $_SESSION['perfil'] ?? '';
    $zona_horaria = $_SESSION['zona_horaria'] ?? '';
    ?>

    <h2 class="text-primary">Preferencias del Usuario</h2>
    <form action="preferencias.php" method="post">
        <div class="form-group">
            <label for="idioma">Idioma:</label>
            <select class="form-control" id="idioma" name="idioma">
                <option value="ingles" <?= ($idioma == 'ingles') ? 'selected' : '' ?>>Inglés</option>
                <option value="espanol" <?= ($idioma == 'espanol') ? 'selected' : '' ?>>Español</option>
            </select>
        </div>
        <div class="form-group">
            <label for="perfil">Perfil público:</label>
            <select class="form-control" id="perfil" name="perfil">
                <option value="si" <?= ($perfil == 'si') ? 'selected' : '' ?>>Sí</option>
                <option value="no" <?= ($perfil == 'no') ? 'selected' : '' ?>>No</option>
            </select>
        </div>
        <div class="form-group">
            <label for="zona_horaria">Zona horaria:</label>
            <select class="form-control" id="zona_horaria" name="zona_horaria">
                <option value="GMT-2" <?= ($zona_horaria == 'GMT-2') ? 'selected' : '' ?>>GMT-2</option>
                <option value="GMT-1" <?= ($zona_horaria == 'GMT-1') ? 'selected' : '' ?>>GMT-1</option>
                <option value="GMT" <?= ($zona_horaria == 'GMT') ? 'selected' : '' ?>>GMT</option>
                <option value="GMT+1" <?= ($zona_horaria == 'GMT+1') ? 'selected' : '' ?>>GMT+1</option>
                <option value="GMT+2" <?= ($zona_horaria == 'GMT+2') ? 'selected' : '' ?>>GMT+2</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Establecer preferencias</button>
        <a href="mostrar.php" class="btn btn-secondary ml-2">Mostrar preferencias</a>
    </form>

    <?php
    // Verifica si se ha enviado el formulario
    if (isset($_POST['submit'])) {
        // Almacena las preferencias en la sesión del usuario
        $_SESSION['idioma'] = $_POST['idioma'];
        $_SESSION['perfil'] = $_POST['perfil'];
        $_SESSION['zona_horaria'] = $_POST['zona_horaria'];
        echo '<p class="text-success mt-3">Preferencias de usuario guardadas</p>';
    }
    ?>

</body>

</html>
