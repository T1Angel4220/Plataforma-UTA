-- ==========================================================
-- Esquema de Base de Datos: Plataforma Educativa UTA
-- Universidad Técnica de Ambato (FISEI)
-- ==========================================================

CREATE DATABASE IF NOT EXISTS `plataforma_educativa` 
  DEFAULT CHARACTER SET utf8mb4 
  COLLATE utf8mb4_unicode_ci;

USE `plataforma_educativa`;

-- ----------------------------------------------------------
-- Estructura de tabla para `logindocente`
-- ----------------------------------------------------------
CREATE TABLE IF NOT EXISTS `logindocente` (
  `id_Docente` int(11) NOT NULL AUTO_INCREMENT,
  `id_PrimerNombre` varchar(50) NOT NULL,
  `id_SegundoNombre` varchar(50) DEFAULT NULL,
  `id_PrimerApellido` varchar(50) NOT NULL,
  `id_SegundoApellido` varchar(50) DEFAULT NULL,
  `id_NumeroDocumento` varchar(10) NOT NULL,
  `id_NombreUsuario` varchar(50) NOT NULL,
  `id_CorreoElectronico` varchar(100) NOT NULL,
  `id_Clave` varchar(255) NOT NULL,
  `id_Verificacion` varchar(100) DEFAULT NULL,
  `id_Activo` tinyint(1) DEFAULT 0,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_Docente`),
  UNIQUE KEY `idx_usuario` (`id_NombreUsuario`),
  UNIQUE KEY `idx_cedula` (`id_NumeroDocumento`),
  UNIQUE KEY `idx_correo` (`id_CorreoElectronico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------------------------------------
-- Estructura de tabla para `docentes` (Verificación externa)
-- ----------------------------------------------------------
CREATE TABLE IF NOT EXISTS `docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `verification_code` varchar(100) NOT NULL,
  `status` varchar(20) DEFAULT 'pending',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------------------------------------
-- Datos de prueba para demostración (Opcional)
-- ----------------------------------------------------------
INSERT INTO `logindocente` (
  `id_PrimerNombre`,
  `id_SegundoNombre`,
  `id_PrimerApellido`,
  `id_SegundoApellido`,
  `id_NumeroDocumento`,
  `id_NombreUsuario`,
  `id_CorreoElectronico`,
  `id_Clave`,
  `id_Activo`
) VALUES (
  'Angel',
  'Eduardo',
  'Ayuquina',
  'Docente',
  '1801234567',
  'docente.demo',
  'docente@uta.edu.ec',
  'Demo123*',
  1
) ON DUPLICATE KEY UPDATE `id_Docente`=`id_Docente`;
