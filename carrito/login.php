<?php
session_start();
require_once 'conexion.php';
//Si se pulsa el boton de Login del formulario html
if (isset($_POST['login'])) {
    try {
        //Capturamos nombre y contraseña y asocioamos a una variable
        //en esta app el nombre es gestor y la contraseña pass
        $login = $_POST['usuario']; //capturamos name= usuario
        $pass = $_POST['pass'];//capturamos name=pass
        //La contraseña que introdice usuario se pasa a hash
        //para poder compararla con la de la BBDD
        $hashedPasswordUsuario = hash('sha256', $pass);
        
        //Variable con la consulta
        $sql = "SELECT * FROM usuarios WHERE usuario=:u AND pass=:p";
        $result = $conProyecto->prepare($sql);

        //UTILIZANDO bindParam-------------------------------------------
      //  $result->bindParam(":u", $login, PDO::PARAM_STR);
      //  $result->bindParam(":p", $hashedPasswordUsuario, PDO::PARAM_STR);

      //UTILIZANDO  array asociativo como argumento al método 
        $result->execute([
            ':u' => $login,
            ':p' => $hashedPasswordUsuario
        ]);
        
        //Si la busqueda tiene mas de una fila es que hay exito                            
                           //  $exito=$result->rowCount();
                           //  if ($exito==1) { 
         if ($result->rowCount() == 1) {                           
            //Si hay exito creamos una sesion llamada nombre que contiene el valor de la 
            //varible login ( nombre que mete usuairo) y nos lleva a listado.php
            $_SESSION['nombre'] = $login;
            header("Location: listado.php");
            exit();
        } else {
            //Si no hay exito nos crea una sesion 'error' que almacena un mensaje
            $_SESSION['error'] = "Nombre de usuario o contraseña incorrecta";//este msj se capta al final del codigo
            header("Location: login.php");
            exit();
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    } 
    
    finally {
        cerrar($result);
       
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
</head>

<body style="background:silver;">
    <div class="container mt-5">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <!--Muestra el formulario de Usuario y contraseña con font awesome-->
                    <form name='login' method='POST' action='<?php echo $_SERVER['PHP_SELF']; ?>'>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <!--Esto agrega el emoti de fontawesome-->
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Usuario" name='usuario' required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="Contraseña" name='pass' required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn float-right btn-success" name='login'>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <?php
        //Sesion creada en la parte superior si no hay exito en el login
        if (isset($_SESSION['error'])) {
            echo "<div class='mt-3 text-danger font-weight-bold text-lg'>";
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            echo "</div>";
        }
        ?>
    </div>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-pzjw8+ua5KlX6a5zKE5b3uvmKcSAwiE8A6zjsJZ8Ck9aQ8z8Bx6jlikF5FaDO8SO"
        crossorigin="anonymous"></script>
</body>

</html>
