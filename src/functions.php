<?php
// Función para obtener usuarios con caché
function obtenerUsuariosConCache() {
    $cache_file = 'cache/usuarios_cache.json';
    
    // Verificar si el archivo de caché existe y es reciente (por ejemplo, 1 hora)
    if (file_exists($cache_file) && (time() - filemtime($cache_file) < 3600)) {
        // Leer desde la caché
        $usuarios = json_decode(file_get_contents($cache_file), true);
    } else {
        // Conectar a la base de datos
        include 'db.php';
        $stmt = $conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Guardar el resultado en caché
        file_put_contents($cache_file, json_encode($usuarios));
    }
    
    return $usuarios;
}
?>
