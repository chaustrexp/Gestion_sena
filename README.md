# 🎓 Dashboard SENA - Sistema de Gestión Académica

Sistema web completo de gestión académica desarrollado para el Servicio Nacional de Aprendizaje (SENA) con arquitectura MVC, diseño moderno y paleta de colores institucional.

![SENA](https://img.shields.io/badge/SENA-Sistema%20Académico-39A900?style=for-the-badge)
![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

## 📋 Tabla de Contenidos

- [Características](#-características)
- [Tecnologías](#-tecnologías)
- [Requisitos](#-requisitos)
- [Instalación](#-instalación)
- [Configuración](#-configuración)
- [Uso](#-uso)
- [Módulos](#-módulos)
- [Estructura del Proyecto](#-estructura-del-proyecto)
- [Capturas de Pantalla](#-capturas-de-pantalla)
- [Solución de Problemas](#-solución-de-problemas)
- [Contribuir](#-contribuir)
- [Licencia](#-licencia)

## ✨ Características

- ✅ **Arquitectura MVC** - Modelo-Vista separados para mejor organización
- ✅ **13 Módulos CRUD Completos** - Gestión integral de datos académicos
- ✅ **Sistema de Autenticación** - Login seguro con bcrypt
- ✅ **Diseño Moderno** - UI/UX profesional con animaciones
- ✅ **Paleta Institucional SENA** - Colores oficiales (#39A900, #007832)
- ✅ **Responsive Design** - Compatible con PC, tablet y móvil
- ✅ **UTF-8 Completo** - Soporte total para caracteres especiales
- ✅ **PDO Preparado** - Consultas seguras contra SQL Injection
- ✅ **Documentación Completa** - Guías de instalación y uso

## 🛠 Tecnologías

- **Backend:** PHP 8.0+ (PDO)
- **Base de Datos:** MySQL 8.0+
- **Frontend:** HTML5, CSS3, JavaScript
- **Servidor:** Apache (XAMPP)
- **Fuentes:** Google Fonts (Poppins)
- **Arquitectura:** MVC (Model-View-Controller)

## 📦 Requisitos

- XAMPP 8.0+ (o similar con Apache + MySQL + PHP)
- PHP 8.0 o superior
- MySQL 8.0 o superior
- Navegador web moderno (Chrome, Firefox, Edge)
- Git (para clonar el repositorio)

## 🚀 Instalación

### 1. Clonar el Repositorio

```bash
git clone https://github.com/chaustrexp/Gestion_sena.git
cd Gestion_sena
```

### 2. Copiar Archivos al Servidor

```bash
# Windows (XAMPP)
xcopy /E /I dashboard_sena C:\xampp\htdocs\dashboard_sena

# Linux/Mac
cp -r dashboard_sena /opt/lampp/htdocs/
```

### 3. Crear Base de Datos

1. Abrir phpMyAdmin: `http://localhost/phpmyadmin`
2. Crear nueva base de datos: `dashboard_sena`
3. Importar el archivo: `dashboard_sena/database.sql`

### 4. Configurar Conexión

Editar `dashboard_sena/conexion.php` si es necesario:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'dashboard_sena');
define('DB_USER', 'root');
define('DB_PASS', '');
```

### 5. Acceder al Sistema

```
http://localhost/dashboard_sena/auth/login.php
```

## 🔐 Configuración

### Credenciales de Acceso

**Usuario Administrador:**
- Email: `admin@sena.edu.co`
- Contraseña: `admin123`

**Usuario Instructor:**
- Email: `instructor@sena.edu.co`
- Contraseña: `instructor123`

**Usuario Coordinador:**
- Email: `coordinador@sena.edu.co`
- Contraseña: `coordinador123`

### Reparar Codificación UTF-8

Si los caracteres con tildes aparecen mal (TecnologÃ­a en lugar de Tecnología):

```
http://localhost/dashboard_sena/reparar_doble_codificacion.php
```

Este script corrige automáticamente la doble codificación UTF-8 en todas las tablas.

## 💻 Uso

### Iniciar Sesión

1. Acceder a `http://localhost/dashboard_sena/auth/login.php`
2. Ingresar credenciales
3. Hacer clic en "Iniciar Sesión"

### Navegación

- **Sidebar Izquierdo:** Menú de navegación con todos los módulos
- **Navbar Superior:** Usuario actual y botón de cerrar sesión
- **Dashboard Principal:** Estadísticas y resumen del sistema

### Operaciones CRUD

Cada módulo incluye:
- **Listar:** Ver todos los registros en tabla
- **Crear:** Agregar nuevo registro
- **Editar:** Modificar registro existente
- **Ver:** Ver detalles completos
- **Eliminar:** Borrar registro (con confirmación)

## 📚 Módulos

| Módulo | Descripción | Ruta |
|--------|-------------|------|
| **Dashboard** | Panel principal con estadísticas | `/index.php` |
| **Programa** | Gestión de programas académicos | `/views/programa/` |
| **Ficha** | Gestión de fichas de formación | `/views/ficha/` |
| **Instructor** | Gestión de instructores | `/views/instructor/` |
| **Ambiente** | Gestión de ambientes de aprendizaje | `/views/ambiente/` |
| **Asignación** | Asignación de instructores a fichas | `/views/asignacion/` |
| **Competencia** | Gestión de competencias | `/views/competencia/` |
| **Competencia Programa** | Relación competencias-programas | `/views/competencia_programa/` |
| **Detalle Asignación** | Detalles de asignaciones | `/views/detalle_asignacion/` |
| **Sede** | Gestión de sedes | `/views/sede/` |
| **Coordinación** | Gestión de coordinaciones | `/views/coordinacion/` |
| **Centro Formación** | Gestión de centros | `/views/centro_formacion/` |
| **Título Programa** | Títulos académicos | `/views/titulo_programa/` |

## 📁 Estructura del Proyecto

```
dashboard_sena/
│
├── auth/                          # Sistema de autenticación
│   ├── login.php                  # Página de login
│   ├── logout.php                 # Cerrar sesión
│   ├── check_auth.php             # Verificación de sesión
│   └── login.sql                  # Tabla de usuarios
│
├── model/                         # Modelos (Capa de datos)
│   ├── AmbienteModel.php
│   ├── AsignacionModel.php
│   ├── CentroFormacionModel.php
│   ├── CompetenciaModel.php
│   ├── CompetenciaProgramaModel.php
│   ├── CoordinacionModel.php
│   ├── DetalleAsignacionModel.php
│   ├── FichaModel.php
│   ├── InstructorModel.php
│   ├── ProgramaModel.php
│   ├── SedeModel.php
│   └── TituloProgramaModel.php
│
├── views/                         # Vistas (Capa de presentación)
│   ├── layout/                    # Plantillas compartidas
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── sidebar.php
│   │
│   ├── ambiente/                  # CRUD Ambiente
│   ├── asignacion/                # CRUD Asignación
│   ├── centro_formacion/          # CRUD Centro Formación
│   ├── competencia/               # CRUD Competencia
│   ├── competencia_programa/      # CRUD Competencia Programa
│   ├── coordinacion/              # CRUD Coordinación
│   ├── detalle_asignacion/        # CRUD Detalle Asignación
│   ├── ficha/                     # CRUD Ficha
│   ├── instructor/                # CRUD Instructor
│   ├── programa/                  # CRUD Programa
│   ├── sede/                      # CRUD Sede
│   └── titulo_programa/           # CRUD Título Programa
│
├── assets/                        # Recursos estáticos
│   └── css/
│       └── styles.css             # Estilos principales
│
├── conexion.php                   # Conexión a base de datos
├── database.sql                   # Script de base de datos
├── index.php                      # Dashboard principal
├── reparar_doble_codificacion.php # Script reparación UTF-8
└── README.md                      # Este archivo
```

## 🎨 Paleta de Colores

```css
/* Verde Principal SENA */
#39A900

/* Verde Secundario SENA */
#007832

/* Fondos */
#FFFFFF (Blanco)
#F8FFF8 (Blanco verdoso)

/* Textos */
#333333 (Oscuro)
#666666 (Gris)
```

## 📸 Capturas de Pantalla

### Login
Diseño moderno con animaciones, fondo blanco con gradientes verdes y logo institucional.

### Dashboard
Panel principal con estadísticas, cards informativos y navegación lateral.

### Módulos CRUD
Tablas modernas con botones de acción, formularios validados y diseño responsive.

## 🔧 Solución de Problemas

### Problema: Caracteres con tildes aparecen mal

**Síntoma:** TecnologÃ­a, GestiÃ³n, FormaciÃ³n

**Solución:**
```
http://localhost/dashboard_sena/reparar_doble_codificacion.php
```

### Problema: Error de conexión a base de datos

**Solución:**
1. Verificar que MySQL esté corriendo
2. Verificar credenciales en `conexion.php`
3. Verificar que la base de datos `dashboard_sena` exista

### Problema: Página en blanco

**Solución:**
1. Activar errores en PHP: `error_reporting(E_ALL);`
2. Verificar logs de Apache: `xampp/apache/logs/error.log`
3. Verificar permisos de archivos

### Problema: Login no funciona

**Solución:**
1. Verificar que la tabla `usuarios` exista
2. Ejecutar `auth/login.sql` para crear usuarios
3. Verificar que las contraseñas estén hasheadas con bcrypt

## 🤝 Contribuir

Las contribuciones son bienvenidas. Para cambios importantes:

1. Fork el proyecto
2. Crear una rama (`git checkout -b feature/nueva-funcionalidad`)
3. Commit los cambios (`git commit -m 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Abrir un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 👥 Autores

- **Desarrollador Principal** - [chaustrexp](https://github.com/chaustrexp)

## 🙏 Agradecimientos

- SENA - Servicio Nacional de Aprendizaje
- Comunidad de desarrolladores PHP
- Google Fonts (Poppins)

## 📞 Soporte

Para reportar bugs o solicitar nuevas funcionalidades, por favor abrir un [Issue](https://github.com/chaustrexp/Gestion_sena/issues).

---

⭐ Si este proyecto te fue útil, considera darle una estrella en GitHub!

**Desarrollado con ❤️ para el SENA**
