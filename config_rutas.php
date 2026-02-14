<?php
/**
 * Script para actualizar rutas del proyecto
 * Cambia /dashboard_sena/ por /Gestion-sena/
 */

$directorio_base = __DIR__;
$ruta_antigua = '/dashboard_sena/';
$ruta_nueva = '/Gestion-sena/';

// Archivos a actualizar
$archivos = [
    'dashboard_sena/views/layout/sidebar.php',
    'dashboard_sena/views/layout/header.php',
    'dashboard_sena/views/layout/footer.php',
    'dashboard_sena/auth/login.php',
    'dashboard_sena/auth/logout.php',
    'dashboard_sena/auth/check_auth.php',
    'dashboard_sena/reparar_doble_codificacion.php',
    'dashboard_sena/reparar_caracteres.php',
    'dashboard_sena/corregir_datos_utf8.php'
];

echo "🔧 Actualizando rutas del proyecto...\n\n";

foreach ($archivos as $archivo) {
    $ruta_completa = $directorio_base . '/' . $archivo;
    
    if (file_exists($ruta_completa)) {
        $contenido = file_get_contents($ruta_completa);
        $contenido_nuevo = str_replace($ruta_antigua, $ruta_nueva, $contenido);
        file_put_contents($ruta_completa, $contenido_nuevo);
        echo "✅ Actualizado: $archivo\n";
    } else {
        echo "❌ No encontrado: $archivo\n";
    }
}

echo "\n🎉 ¡Rutas actualizadas correctamente!\n";
echo "Ahora puedes acceder al sistema en: http://localhost/Gestion-sena/\n";
?>
