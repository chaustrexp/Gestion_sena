<?php
session_start();

// Si ya está logueado, redirigir al dashboard
if (isset($_SESSION['usuario_id'])) {
    header('Location: /dashboard_sena/index.php');
    exit;
}

require_once __DIR__ . '/../conexion.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    if (!empty($email) && !empty($password)) {
        try {
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ? AND estado = 'Activo'");
            $stmt->execute([$email]);
            $usuario = $stmt->fetch();
            
            if ($usuario && password_verify($password, $usuario['password'])) {
                // Login exitoso
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['usuario_email'] = $usuario['email'];
                $_SESSION['usuario_rol'] = $usuario['rol'];
                
                // Actualizar último acceso
                $stmt = $db->prepare("UPDATE usuarios SET ultimo_acceso = NOW() WHERE id = ?");
                $stmt->execute([$usuario['id']]);
                
                header('Location: /dashboard_sena/index.php');
                exit;
            } else {
                $error = 'Credenciales incorrectas o usuario inactivo';
            }
        } catch (PDOException $e) {
            $error = 'Error de conexión. Intente nuevamente.';
        }
    } else {
        $error = 'Por favor complete todos los campos';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dashboard SENA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, rgba(57, 169, 0, 0.05) 0%, rgba(0, 120, 50, 0.05) 100%),
                        linear-gradient(45deg, #ffffff 0%, #f8fff8 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* Animated Background */
        body::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle at 20% 50%, rgba(57, 169, 0, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(0, 120, 50, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 40% 20%, rgba(57, 169, 0, 0.05) 0%, transparent 50%);
            animation: moveBackground 20s ease-in-out infinite;
        }
        
        @keyframes moveBackground {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-50px, -50px); }
        }
        
        /* Floating Particles */
        .particle {
            position: absolute;
            background: rgba(57, 169, 0, 0.15);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }
        
        .particle:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
        .particle:nth-child(2) { width: 60px; height: 60px; top: 70%; left: 80%; animation-delay: 2s; }
        .particle:nth-child(3) { width: 100px; height: 100px; top: 50%; left: 5%; animation-delay: 4s; }
        .particle:nth-child(4) { width: 50px; height: 50px; top: 20%; left: 85%; animation-delay: 6s; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.2; }
            50% { transform: translateY(-30px) scale(1.1); opacity: 0.4; }
        }
        
        .login-container {
            background: white;
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(57, 169, 0, 0.15);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 600px;
            position: relative;
            z-index: 10;
            border: 1px solid rgba(57, 169, 0, 0.1);
        }
        
        .login-left {
            background: linear-gradient(135deg, #39A900 0%, #007832 100%);
            padding: 60px 50px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .login-left::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }
        
        .login-left::after {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            bottom: -50px;
            left: -50px;
        }
        
        .logo-circle {
            width: 140px;
            height: 140px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 2;
            animation: pulse 3s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .logo-circle svg {
            width: 80px;
            height: 80px;
            fill: #39A900;
        }
        
        .login-left h1 {
            font-size: 56px;
            margin-bottom: 15px;
            font-weight: 800;
            letter-spacing: 3px;
            position: relative;
            z-index: 2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        
        .login-left p {
            font-size: 16px;
            opacity: 0.95;
            line-height: 1.8;
            font-weight: 300;
            position: relative;
            z-index: 2;
            max-width: 300px;
        }
        
        .login-left .version {
            position: absolute;
            bottom: 20px;
            font-size: 12px;
            opacity: 0.7;
            z-index: 2;
        }
        
        .login-right {
            padding: 60px 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background: white;
        }
        
        .login-header {
            margin-bottom: 40px;
        }
        
        .login-header h2 {
            color: #007832;
            font-size: 36px;
            margin-bottom: 8px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .login-header p {
            color: #666;
            font-size: 14px;
            font-weight: 400;
        }
        
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }
        
        .form-group label {
            display: block;
            color: #007832;
            font-weight: 600;
            margin-bottom: 10px;
            font-size: 13px;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }
        
        .form-group input {
            width: 100%;
            padding: 16px 16px 16px 45px;
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            font-size: 15px;
            font-family: inherit;
            transition: all 0.3s;
            background: #fafffe;
        }
        
        .form-group input:focus {
            outline: none;
            border-color: #39A900;
            background: white;
            box-shadow: 0 0 0 4px rgba(57, 169, 0, 0.1);
        }
        
        .form-group input::placeholder {
            color: #bbb;
        }
        
        .btn-login {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #39A900 0%, #007832 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
            text-transform: uppercase;
            box-shadow: 0 4px 15px rgba(57, 169, 0, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(57, 169, 0, 0.4);
        }
        
        .btn-login:active {
            transform: translateY(-1px);
        }
        
        .alert-error {
            background: linear-gradient(135deg, #ff4757 0%, #ff3838 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            box-shadow: 0 4px 15px rgba(255, 71, 87, 0.3);
        }
        
        .alert-error::before {
            content: '⚠';
            margin-right: 10px;
            font-size: 20px;
        }
        
        .options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-size: 13px;
        }
        
        .options label {
            display: flex;
            align-items: center;
            color: #666;
            cursor: pointer;
            font-weight: 500;
        }
        
        .options input[type="checkbox"] {
            margin-right: 8px;
            width: 18px;
            height: 18px;
            cursor: pointer;
        }
        
        .options a {
            color: #39A900;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .options a:hover {
            color: #007832;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            color: #999;
            font-size: 13px;
        }
        
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #e8e8e8;
        }
        
        .divider::before {
            margin-right: 15px;
        }
        
        .divider::after {
            margin-left: 15px;
        }
        
        .demo-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 20px;
            border-radius: 12px;
            font-size: 13px;
            color: #495057;
            border: 2px dashed #dee2e6;
        }
        
        .demo-box strong {
            color: #007832;
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-weight: 700;
            font-size: 14px;
        }
        
        .demo-box strong::before {
            content: '🔑';
            margin-right: 8px;
            font-size: 18px;
        }
        
        .demo-item {
            display: flex;
            justify-content: space-between;
            margin: 8px 0;
            padding: 8px;
            background: white;
            border-radius: 6px;
        }
        
        .demo-item span:first-child {
            font-weight: 600;
            color: #6c757d;
        }
        
        .demo-item span:last-child {
            font-family: 'Courier New', monospace;
            color: #007832;
        }
        
        @media (max-width: 968px) {
            .login-container {
                grid-template-columns: 1fr;
                max-width: 500px;
            }
            
            .login-left {
                padding: 50px 30px;
                min-height: 300px;
            }
            
            .login-left h1 {
                font-size: 42px;
            }
            
            .logo-circle {
                width: 100px;
                height: 100px;
            }
            
            .logo-circle svg {
                width: 60px;
                height: 60px;
            }
            
            .login-right {
                padding: 40px 30px;
            }
            
            .login-header h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    
    <div class="login-container">
        <div class="login-left">
            <div class="logo-circle">
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5zm0 18c-3.31 0-6-2.69-6-6s2.69-6 6-6 6 2.69 6 6-2.69 6-6 6zm0-10c-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4z"/>
                </svg>
            </div>
            <h1>SENA</h1>
            <p>Sistema de Gestión Académica<br>Servicio Nacional de Aprendizaje</p>
            <div class="version">v2.0.0 - 2026</div>
        </div>
        
        <div class="login-right">
            <div class="login-header">
                <h2>Bienvenido</h2>
                <p>Ingrese sus credenciales para continuar</p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert-error">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input type="email" id="email" name="email" placeholder="usuario@sena.edu.co" required autofocus>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="input-wrapper">
                        <span class="input-icon">🔒</span>
                        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" required>
                    </div>
                </div>
                
                <button type="submit" class="btn-login">Iniciar Sesión</button>
                
                <div class="options">
                    <label>
                        <input type="checkbox" name="remember">
                        Recordarme
                    </label>
                    <a href="#">¿Olvidó su contraseña?</a>
                </div>
            </form>
            
            <div class="divider">Credenciales de Prueba</div>
            
            <div class="demo-box">
                <strong>Acceso de Demostración</strong>
                <div class="demo-item">
                    <span>Email:</span>
                    <span>admin@sena.edu.co</span>
                </div>
                <div class="demo-item">
                    <span>Contraseña:</span>
                    <span>admin123</span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
