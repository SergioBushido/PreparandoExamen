<?php
$nombre = 'sergio';
$pass = '123';

// Calcular el hash de la contraseña usando SHA-256
$hashed_pass = hash('sha256', $pass);

// Verificar valor de $pass
if (empty($pass)) {
    echo "La contraseña está vacía o nula.";
} else {
    echo "Valor de la contraseña: " . $pass;
}

echo "Hashed Password: " . $hashed_pass;

try {
    $conexion = new PDO("mysql:host=localhost;dbname=peaxamen", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Preparar la consulta SQL para insertar el usuario y la contraseña hash
    $sql = "INSERT INTO usuarios (nombre, pass) VALUES (:nombre, :pass)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':pass', $hashed_pass, PDO::PARAM_STR);

    // Ejecutar la consulta
    $stmt->execute();

    echo "Usuario insertado correctamente con contraseña hash SHA-256 segura.";
} catch (PDOException $e) {
    echo "Error en la conexión o consulta SQL: " . $e->getMessage();
}
?>
