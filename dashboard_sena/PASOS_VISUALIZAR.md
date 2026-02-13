# 🎯 PASOS PARA VISUALIZAR EL DASHBOARD SENA

## ✅ Estado Actual
- ✅ Proyecto copiado a: `C:\xampp\htdocs\dashboard_sena\`
- ✅ MySQL corriendo
- ⚠️ Apache necesita iniciarse
- ⚠️ Base de datos necesita importarse

## 🚀 PASOS RÁPIDOS

### 1. Iniciar Apache
```
1. Abrir XAMPP Control Panel
2. Click en "Start" junto a Apache
3. Esperar que se ponga verde
```

### 2. Importar Base de Datos

**Opción A: Desde phpMyAdmin (Ya abierto)**
1. En phpMyAdmin, click "Nuevo"
2. Nombre: `dashboard_sena`
3. Cotejamiento: `utf8mb4_unicode_ci`
4. Click "Crear"
5. Seleccionar BD "dashboard_sena"
6. Click pestaña "Importar"
7. Seleccionar archivo: `C:\xampp\htdocs\dashboard_sena\database.sql`
8. Click "Continuar"

**Opción B: Desde línea de comandos**
```cmd
cd C:\xampp\mysql\bin
mysql -u root -p
CREATE DATABASE dashboard_sena CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dashboard_sena;
SOURCE C:/xampp/htdocs/dashboard_sena/database.sql;
EXIT;
```

### 3. Abrir Dashboard
```
http://localhost/dashboard_sena/
```

## 🎨 Lo que Verás

### Dashboard Principal
- Sidebar verde SENA a la izquierda
- Navbar blanca con borde verde arriba
- 5 cards de estadísticas:
  * Total Programas
  * Total Fichas
  * Total Instructores
  * Total Ambientes
  * Total Asignaciones
- Tabla de últimas asignaciones

### Módulos Disponibles (Menú Lateral)
1. 📊 Dashboard
2. 📚 Programas
3. 📋 Fichas
4. 👨‍🏫 Instructores
5. 🏢 Ambientes
6. 📅 Asignaciones
7. 🎯 Competencias
8. 🔗 Competencia-Programa
9. 📝 Detalle Asignación
10. 🏛️ Sedes
11. 👔 Coordinación
12. 🏫 Centro Formación
13. 🎓 Título Programa

## 🧪 Probar el Sistema

### Crear un Programa
1. Click en "Programas" en el menú
2. Click "+ Nuevo Programa"
3. Llenar:
   - Código: ADSO
   - Nombre: Análisis y Desarrollo de Software
   - Duración: 24 meses
   - Título: Tecnólogo
4. Click "Guardar"
5. Ver el registro en la tabla

### Crear una Ficha
1. Click en "Fichas"
2. Click "+ Nueva Ficha"
3. Llenar:
   - Número: 2898765
   - Programa: Seleccionar uno
   - Fecha Inicio: 2024-01-15
   - Fecha Fin: 2026-01-15
   - Estado: Activa
4. Click "Guardar"

## 🎨 Paleta de Colores SENA

- **Verde Principal**: #39A900
- **Verde Secundario**: #007832
- **Verde Hover**: #005a25
- **Blanco**: #ffffff
- **Gris Claro**: #f5f5f5

## 📱 Responsive

El dashboard funciona en:
- 💻 PC (1920x1080)
- 📱 Tablet (768x1024)
- 📱 Móvil (375x667)

## 🔗 Enlaces Directos

```
Dashboard:        http://localhost/dashboard_sena/
Programas:        http://localhost/dashboard_sena/views/programa/index.php
Fichas:           http://localhost/dashboard_sena/views/ficha/index.php
Instructores:     http://localhost/dashboard_sena/views/instructor/index.php
Ambientes:        http://localhost/dashboard_sena/views/ambiente/index.php
Asignaciones:     http://localhost/dashboard_sena/views/asignacion/index.php
Competencias:     http://localhost/dashboard_sena/views/competencia/index.php
Sedes:            http://localhost/dashboard_sena/views/sede/index.php
Centro Formación: http://localhost/dashboard_sena/views/centro_formacion/index.php
Título Programa:  http://localhost/dashboard_sena/views/titulo_programa/index.php
phpMyAdmin:       http://localhost/phpmyadmin
```

## 🚨 Solución de Problemas

### Error: "No se puede conectar a la base de datos"
✅ Verificar que MySQL esté corriendo
✅ Verificar que la BD "dashboard_sena" exista
✅ Verificar credenciales en conexion.php

### Página en blanco
✅ Iniciar Apache en XAMPP
✅ Verificar ruta: C:\xampp\htdocs\dashboard_sena\
✅ Revisar logs: C:\xampp\apache\logs\error.log

### Estilos no cargan
✅ Verificar: dashboard_sena/assets/css/styles.css
✅ Presionar Ctrl + F5 (limpiar caché)
✅ Verificar rutas en header.php

### Error 404
✅ Verificar que la carpeta esté en htdocs
✅ Verificar URL: http://localhost/dashboard_sena/

## 📊 Datos de Ejemplo

El archivo database.sql incluye:
- 2 Centros de Formación
- 2 Sedes
- 3 Títulos de Programa
- 2 Programas (ADSO, Gestión Administrativa)
- 2 Instructores
- 2 Ambientes
- 2 Competencias

## 🎯 Siguiente Paso

Una vez importada la BD y Apache corriendo:

1. Refrescar: http://localhost/dashboard_sena/
2. Deberías ver el dashboard completo
3. Navegar por los módulos
4. Crear, editar, ver y eliminar registros

---

**¡Disfruta tu Dashboard SENA!** 🎓
