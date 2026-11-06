<?php
/**
 * Validación de Inicio de Sesión de Docentes
 * Plataforma Educativa - Universidad Técnica de Ambato
 */

require_once "conexion.php";

$id_NombreUsuario = isset($_POST['IngresoUsuario']) ? trim($_POST['IngresoUsuario']) : (isset($_POST['IngresoCorreo']) ? trim($_POST['IngresoCorreo']) : '');
$id_Clave = isset($_POST['IngresoClave']) ? trim($_POST['IngresoClave']) : '';

if (empty($id_NombreUsuario) || empty($id_Clave)) {
    echo "Por favor ingrese su usuario/correo y contraseña.";
    exit();
}

// Escapar entradas para evitar inyección SQL básica
$id_NombreUsuario = $conexion->real_escape_string($id_NombreUsuario);
$id_Clave = $conexion->real_escape_string($id_Clave);

// Consulta SQL para verificar el usuario o correo electrónico y la contraseña
$sql = "SELECT * FROM logindocente WHERE (id_NombreUsuario = '$id_NombreUsuario' OR id_CorreoElectronico = '$id_NombreUsuario') AND id_Clave = '$id_Clave'";
$result = $conexion->query($sql);

// Verificar si se encontró un usuario con los datos proporcionados
if ($result && $result->num_rows > 0) {
    session_start();
    $row = $result->fetch_assoc();
    $_SESSION['nombre_usuario'] = trim($row['id_PrimerNombre'] . ' ' . $row['id_SegundoNombre'] . ' ' . $row['id_PrimerApellido'] . ' ' . $row['id_SegundoApellido']);
    $_SESSION['id_NombreUsuario'] = $row['id_NombreUsuario'];
    $_SESSION['correo_usuario'] = $row['id_CorreoElectronico'];

    // Redirigir al docente al panel principal
    header("Location: plataformaMain.php");
    exit();
} else {
    echo "<script>alert('Las credenciales ingresadas no son válidas.'); window.location.href='LoginPlataforma.php';</script>";
}

$conexion->close();
?>
