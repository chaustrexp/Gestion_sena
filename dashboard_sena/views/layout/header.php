<?php
// Verificar autenticación
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['usuario_id'])) {
    header('Location: /dashboard_sena/auth/login.php');
    exit;
}

// Forzar UTF-8 en la salida
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard SENA'; ?></title>
    <link rel="stylesheet" href="/dashboard_sena/assets/css/styles.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <h1><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard SENA'; ?></h1>
        <div class="navbar-user">
            <span>👤 <?php echo $_SESSION['usuario_nombre']; ?></span>
            <span style="margin: 0 10px; opacity: 0.5;">|</span>
            <span style="font-size: 12px; opacity: 0.7;"><?php echo $_SESSION['usuario_rol']; ?></span>
            <a href="/dashboard_sena/auth/logout.php" class="btn btn-secondary btn-sm" style="margin-left: 15px;">Cerrar Sesión</a>
        </div>
    </nav>
