<?php
/**
 * Registro de Datos del Docente
 * Plataforma Educativa - Universidad Técnica de Ambato
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("conexion.php");

if (!empty($_POST["registrarse"])) {
    // Validar campos obligatorios
    $campos = [
        "Nombre1" => "Primer Nombre",
        "Nombre2" => "Segundo Nombre",
        "Apellido1" => "Primer Apellido",
        "Apellido2" => "Segundo Apellido",
        "cedula" => "Número de Cédula",
        "usuario" => "Nombre de Usuario",
        "correo" => "Correo Electrónico",
        "clave" => "Contraseña"
    ];

    foreach ($campos as $campo => $label) {
        if (empty($_POST[$campo])) {
            echo "<script>alert('El campo {$label} es obligatorio.'); window.history.back();</script>";
            exit();
        }
    }

    $id_PrimerNombre    = $conexion->real_escape_string(trim($_POST["Nombre1"]));
    $id_SegundoNombre   = $conexion->real_escape_string(trim($_POST["Nombre2"]));
    $id_PrimerApellido  = $conexion->real_escape_string(trim($_POST["Apellido1"]));
    $id_SegundoApellido = $conexion->real_escape_string(trim($_POST["Apellido2"]));
    $id_NumeroDocumento = $conexion->real_escape_string(trim($_POST["cedula"]));
    $id_NombreUsuario   = $conexion->real_escape_string(trim($_POST["usuario"]));
    $id_CorreoElectronico = $conexion->real_escape_string(trim($_POST["correo"]));
    $id_Clave           = $conexion->real_escape_string(trim($_POST["clave"]));
    $id_Verificacion    = uniqid();
    $id_Activo          = 0;

    // Guardar en sesión para el proceso de activación
    $_SESSION['usuario_registro'] = $id_NombreUsuario;
    $_SESSION['codigo_verificacion'] = '123456';

    // Insertar en la base de datos
    $sql = "INSERT INTO logindocente (
        id_PrimerNombre,
        id_SegundoNombre,
        id_PrimerApellido,
        id_SegundoApellido,
        id_NumeroDocumento,
        id_NombreUsuario,
        id_CorreoElectronico,
        id_Clave,
        id_Verificacion,
        id_Activo
    ) VALUES (
        '$id_PrimerNombre',
        '$id_SegundoNombre',
        '$id_PrimerApellido',
        '$id_SegundoApellido',
        '$id_NumeroDocumento',
        '$id_NombreUsuario',
        '$id_CorreoElectronico',
        '$id_Clave',
        '$id_Verificacion',
        $id_Activo
    )";

    if ($conexion->query($sql) === TRUE) {
        header("Location: Activacion.php");
        exit();
    } else {
        echo "<script>alert('Error al registrar: " . addslashes($conexion->error) . "'); window.history.back();</script>";
        exit();
    }
}
?>
