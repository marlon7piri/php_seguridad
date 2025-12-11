<?php
// Incluir el archivo de funciones que contiene la función obtenerUsuariosConCache
include '../src/functions.php';

session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php"); // Si no está logueado, redirigir al login
    exit();
}

$usuario_nombre = $_SESSION['usuario_nombre'];

// Obtener los usuarios con caché
$usuarios = obtenerUsuariosConCache();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/seguridad_php/css/styles.css">
</head>
<body>
    <h1>Bienvenido, <?php echo $usuario_nombre; ?>!</h1>
    <p>Este es el dashboard, donde podrás ver la información de los usuarios.</p>
    <a href="logout.php"><button>Cerrar sesión</button></a>

    <h2>Lista de Usuarios</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo $usuario['nombre']; ?></td>
                    <td><?php echo $usuario['email']; ?></td>
                    <td><?php echo $usuario['reg_date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
