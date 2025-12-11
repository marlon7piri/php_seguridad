<?php
// public_html/register.php
include '../src/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];

    // Hash de la contraseña antes de almacenarla
    $hashed_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    // Consulta preparada para evitar SQL Injection
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':contrasena', $hashed_contrasena);

    if ($stmt->execute()) {
        $success = "Registro exitoso. Puedes iniciar sesión ahora.";
    } else {
        $error = "Error en el registro. Intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="/seguridad_php/css/styles.css">
</head>
<body>
    <h1>Registro de Usuario</h1>
    <?php if (isset($success)) { echo "<p>$success</p>"; } ?>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form action="register.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br><br>
        <input type="submit" value="Registrar">
    </form>
    <p>Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a></p>
</body>
</html>
