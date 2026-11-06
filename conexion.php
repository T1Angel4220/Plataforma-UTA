<?php
/**
 * Configuración de conexión a la Base de Datos
 * Plataforma Educativa - Universidad Técnica de Ambato
 */

$db_host = getenv('DB_HOST') ?: 'localhost';
$db_user = getenv('DB_USER') ?: 'root';
$db_pass = getenv('DB_PASS') !== false ? getenv('DB_PASS') : '';
$db_name = getenv('DB_NAME') ?: 'plataforma_educativa';

$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

$conexion->set_charset("utf8");
?>
