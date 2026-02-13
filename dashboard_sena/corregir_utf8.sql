-- Script para corregir codificación UTF-8 en la base de datos
USE dashboard_sena;

-- Configurar la base de datos a UTF-8
ALTER DATABASE dashboard_sena CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Corregir tabla titulo_programa
ALTER TABLE titulo_programa CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Actualizar datos con caracteres correctos
UPDATE titulo_programa SET nombre = 'Técnico' WHERE nombre LIKE '%cnico%' OR nombre LIKE '%T_cnico%';
UPDATE titulo_programa SET nombre = 'Tecnólogo' WHERE nombre LIKE '%logo%' OR nombre LIKE '%Tecn_logo%';
UPDATE titulo_programa SET nombre = 'Especialización' WHERE nombre LIKE '%Especializaci%' OR nombre LIKE '%Especializaci_n%';

-- Corregir todas las tablas
ALTER TABLE centro_formacion CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE sede CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE coordinacion CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE programa CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE ficha CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE instructor CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE ambiente CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE competencia CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE competencia_programa CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE asignacion CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE detalle_asignacion CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
ALTER TABLE usuarios CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Corregir datos específicos conocidos
UPDATE instructor SET nombre = 'Juan Pérez' WHERE nombre LIKE '%Juan P%';
UPDATE instructor SET nombre = 'María García' WHERE nombre LIKE '%Mar%a Garc%';

-- Verificar cambios
SELECT 'Títulos corregidos:' as mensaje;
SELECT id, nombre, nivel FROM titulo_programa;

SELECT 'Instructores corregidos:' as mensaje;
SELECT id, nombre FROM instructor;
