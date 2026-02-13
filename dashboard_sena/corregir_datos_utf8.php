<?php
// Script para corregir datos UTF-8
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');

require_once __DIR__ . '/conexion.php';

echo "<h2>Corrigiendo datos UTF-8...</h2>";

try {
    $db = Database::getInstance()->getConnection();
    
    // Configurar UTF-8
    $db->exec("SET NAMES utf8mb4");
    $db->exec("SET CHARACTER SET utf8mb4");
    
    echo "<p>✓ Conexión UTF-8 configurada</p>";
    
    // Limpiar y reinsertar titulo_programa
    $db->exec("DELETE FROM titulo_programa");
    $stmt = $db->prepare("INSERT INTO titulo_programa (id, nombre, nivel) VALUES (?, ?, ?)");
    
    $titulos = [
        [1, 'Técnico', 'Técnico'],
        [2, 'Tecnólogo', 'Tecnológico'],
        [3, 'Especialización', 'Especialización']
    ];
    
    foreach ($titulos as $titulo) {
        $stmt->execute($titulo);
    }
    
    echo "<p>✓ Títulos de programa corregidos</p>";
    
    // Actualizar instructores
    $db->exec("UPDATE instructor SET nombre = 'Juan Pérez' WHERE id = 1");
    $db->exec("UPDATE instructor SET nombre = 'María García' WHERE id = 2");
    
    echo "<p>✓ Instructores corregidos</p>";
    
    // Actualizar usuarios
    $db->exec("UPDATE usuarios SET nombre = 'Administrador SENA' WHERE id = 1");
    $db->exec("UPDATE usuarios SET nombre = 'Juan Pérez' WHERE id = 2");
    $db->exec("UPDATE usuarios SET nombre = 'María García' WHERE id = 3");
    
    echo "<p>✓ Usuarios corregidos</p>";
    
    // Verificar
    echo "<h3>Verificación:</h3>";
    $stmt = $db->query("SELECT * FROM titulo_programa");
    $titulos = $stmt->fetchAll();
    
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Nivel</th></tr>";
    foreach ($titulos as $titulo) {
        echo "<tr>";
        echo "<td>{$titulo['id']}</td>";
        echo "<td>{$titulo['nombre']}</td>";
        echo "<td>{$titulo['nivel']}</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    echo "<h3>✅ ¡Datos corregidos exitosamente!</h3>";
    echo "<p><a href='/dashboard_sena/'>Ir al Dashboard</a></p>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>✗ Error: " . $e->getMessage() . "</p>";
}
?>
