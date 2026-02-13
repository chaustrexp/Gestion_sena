@echo off
echo ═══════════════════════════════════════════════════════════════════
echo   INICIANDO DASHBOARD SENA
echo ═══════════════════════════════════════════════════════════════════
echo.

echo [1/3] Verificando servicios XAMPP...
echo.

REM Verificar si Apache está corriendo
tasklist /FI "IMAGENAME eq httpd.exe" 2>NUL | find /I /N "httpd.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo ✓ Apache está corriendo
) else (
    echo ✗ Apache NO está corriendo
    echo.
    echo Por favor, inicia Apache desde XAMPP Control Panel
    echo Presiona cualquier tecla para abrir XAMPP Control Panel...
    pause >nul
    start "" "C:\xampp\xampp-control.exe"
    echo.
    echo Después de iniciar Apache, presiona cualquier tecla para continuar...
    pause >nul
)

echo.
echo [2/3] Verificando MySQL...
echo.

REM Verificar si MySQL está corriendo
tasklist /FI "IMAGENAME eq mysqld.exe" 2>NUL | find /I /N "mysqld.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo ✓ MySQL está corriendo
) else (
    echo ✗ MySQL NO está corriendo
    echo Por favor, inicia MySQL desde XAMPP Control Panel
    pause
)

echo.
echo [3/3] Abriendo Dashboard en el navegador...
echo.
timeout /t 2 >nul

REM Abrir en el navegador predeterminado
start http://localhost/dashboard_sena/

echo.
echo ═══════════════════════════════════════════════════════════════════
echo   Dashboard abierto en: http://localhost/dashboard_sena/
echo ═══════════════════════════════════════════════════════════════════
echo.
echo IMPORTANTE: Si ves errores, necesitas importar la base de datos:
echo 1. Ir a: http://localhost/phpmyadmin
echo 2. Crear base de datos: dashboard_sena
echo 3. Importar archivo: database.sql
echo.
echo Presiona cualquier tecla para cerrar...
pause >nul
