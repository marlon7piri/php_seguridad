<?php
// public_html/logout.php
session_start();
session_unset();  // Destruir todas las variables de sesión
session_destroy();  // Destruir la sesión
header("Location: login.php");  // Redirigir al login
exit();
?>
