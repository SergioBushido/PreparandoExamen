<!DOCTYPE html>
<html lang="en">
<head>
    <title>Formulario con Bootstrap</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregamso jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Agregamos el archivo Bootstrap JS después de jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Metemos Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <h1 class="display-3 text-center text-primary">PRUEBA DE LOGIN PDO Y HASH</h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="logic.php" method="post">
                    <div class="mb-3">
                        <label for="login" class="form-label"><i class="fas fa-user"></i> Login</label>
                        <input type="text" class="form-control" id="login" name="login" required>
                    </div>
                    <div class="mb-3">
                        <label for="pass" class="form-label"><i class="fas fa-key"></i> Password</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

