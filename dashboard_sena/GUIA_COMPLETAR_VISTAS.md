# 🚀 GUÍA RÁPIDA PARA COMPLETAR LAS VISTAS RESTANTES

## 📋 VISTAS PENDIENTES (3 módulos)

1. **Competencia** - Simple (3 campos)
2. **Competencia_Programa** - Relacional (3 campos)
3. **Detalle_Asignación** - Relacional (5 campos)
4. **Coordinación** - Relacional (3 campos)
5. **Centro_Formación** - Simple (4 campos)
6. **Título_Programa** - Simple (2 campos)

## ⚡ MÉTODO RÁPIDO: COPIAR Y ADAPTAR

### Paso 1: Crear Carpetas

Crear estas carpetas en `views/`:
- `competencia/`
- `competencia_programa/`
- `detalle_asignacion/`
- `coordinacion/`
- `centro_formacion/`
- `titulo_programa/`

### Paso 2: Copiar Archivos Base

Para cada carpeta, copiar estos 4 archivos desde un módulo similar:

**Módulos Simples** (Competencia, Centro Formación, Título Programa):
- Copiar desde: `views/sede/`

**Módulos Relacionales** (Competencia Programa, Detalle Asignación, Coordinación):
- Copiar desde: `views/ambiente/` o `views/ficha/`

### Paso 3: Buscar y Reemplazar

En cada archivo copiado, reemplazar:

#### Ejemplo: Competencia

```
Buscar: SedeModel
Reemplazar: CompetenciaModel

Buscar: sede
Reemplazar: competencia

Buscar: Sede
Reemplazar: Competencia

Buscar: nombre, direccion, ciudad
Reemplazar: codigo, nombre, descripcion
```

## 📝 CAMPOS POR MÓDULO

### 1. Competencia (Simple)
```php
// Campos del formulario
- codigo (text, required)
- nombre (text, required)
- descripcion (textarea)

// Modelo: CompetenciaModel.php ✅ Ya existe
// Copiar desde: views/sede/
```

### 2. Centro Formación (Simple)
```php
// Campos del formulario
- nombre (text, required)
- codigo (text, required)
- direccion (text)
- telefono (text)

// Modelo: CentroFormacionModel.php ✅ Ya existe
// Copiar desde: views/sede/
```

### 3. Título Programa (Simple)
```php
// Campos del formulario
- nombre (text, required)
- nivel (select: Técnico, Tecnólogo, Especialización)

// Modelo: TituloProgramaModel.php ✅ Ya existe
// Copiar desde: views/sede/
```

### 4. Coordinación (Relacional)
```php
// Campos del formulario
- nombre (text, required)
- centro_formacion_id (select, de CentroFormacionModel)
- responsable (text)

// Modelo: CoordinacionModel.php ✅ Ya existe
// Copiar desde: views/ambiente/
// Relación: CentroFormacionModel
```

### 5. Competencia Programa (Relacional)
```php
// Campos del formulario
- competencia_id (select, de CompetenciaModel)
- programa_id (select, de ProgramaModel)
- horas (number, required)

// Modelo: CompetenciaProgramaModel.php ✅ Ya existe
// Copiar desde: views/ficha/
// Relaciones: CompetenciaModel, ProgramaModel
```

### 6. Detalle Asignación (Relacional)
```php
// Campos del formulario
- asignacion_id (select, de AsignacionModel)
- fecha (date, required)
- hora_inicio (time, required)
- hora_fin (time, required)
- observaciones (textarea)

// Modelo: DetalleAsignacionModel.php ✅ Ya existe
// Copiar desde: views/ficha/
// Relación: AsignacionModel
```

## 🔧 PLANTILLA RÁPIDA

### index.php (Listado)
```php
<?php
require_once __DIR__ . '/../../model/[MODELO]Model.php';
$model = new [MODELO]Model();
if (isset($_GET['eliminar'])) { 
    $model->delete($_GET['eliminar']); 
    header('Location: index.php?msg=eliminado'); 
    exit; 
}
$registros = $model->getAll();
$pageTitle = "Gestión de [MODULO]";
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/sidebar.php';
?>
<div class="main-content">
    <!-- Mensajes y tabla aquí -->
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
```

### crear.php (Formulario)
```php
<?php
require_once __DIR__ . '/../../model/[MODELO]Model.php';
// Agregar modelos de relaciones si aplica
$model = new [MODELO]Model();
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $model->create($_POST); 
    header('Location: index.php?msg=creado'); 
    exit; 
}
$pageTitle = "Crear [MODULO]";
include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/sidebar.php';
?>
<div class="main-content">
    <div class="form-container">
        <h2>Crear Nuevo [MODULO]</h2>
        <form method="POST">
            <!-- Campos del formulario aquí -->
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
<?php include __DIR__ . '/../layout/footer.php'; ?>
```

## ⏱️ TIEMPO ESTIMADO

- Competencia: 10 minutos
- Centro Formación: 10 minutos
- Título Programa: 10 minutos
- Coordinación: 15 minutos
- Competencia Programa: 15 minutos
- Detalle Asignación: 15 minutos

**Total: ~1.5 horas**

## ✅ CHECKLIST

Para cada módulo:
- [ ] Crear carpeta en `views/`
- [ ] Copiar 4 archivos base
- [ ] Adaptar nombres de modelo
- [ ] Adaptar campos del formulario
- [ ] Adaptar columnas de tabla
- [ ] Probar en navegador
- [ ] Verificar crear/editar/ver/eliminar

## 🎯 PRIORIDAD

1. **Alta**: Competencia, Centro Formación, Título Programa (simples)
2. **Media**: Coordinación, Competencia Programa
3. **Baja**: Detalle Asignación

## 💡 TIPS

- Los modelos ya funcionan, solo adapta las vistas
- Usa Ctrl+H (buscar y reemplazar) en tu editor
- Prueba cada módulo antes de pasar al siguiente
- El sidebar ya tiene todos los enlaces configurados
- Los estilos CSS ya están listos

## 🚨 ERRORES COMUNES

1. **Olvidar cambiar el nombre del modelo**
   ```php
   // ❌ Mal
   require_once __DIR__ . '/../../model/SedeModel.php';
   
   // ✅ Bien
   require_once __DIR__ . '/../../model/CompetenciaModel.php';
   ```

2. **No adaptar los campos del formulario**
   - Revisar que los `name=""` coincidan con la base de datos

3. **Olvidar las relaciones**
   - Si el módulo tiene FK, cargar el modelo relacionado

## 📞 SOPORTE

Si encuentras errores:
1. Verificar que el modelo existe en `model/`
2. Verificar nombres de campos en `database.sql`
3. Revisar consola del navegador (F12)
4. Verificar logs de PHP en XAMPP

---

**¡Con esta guía puedes completar el proyecto en menos de 2 horas!** 🚀
