<?php
include("conexion.php");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el nombre y apellido del usuario
$usuarioId = $_SESSION['id_NombreUsuario']; // Suponiendo que tienes una variable de sesión con el ID del usuario
$sql = "SELECT id_PrimerNombre, id_PrimerApellido FROM logindocente WHERE id_NombreUsuario = $usuarioId";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar el mensaje de bienvenida
    $fila = $resultado->fetch_assoc();
    $nombre = $fila["nombre"];
    $apellido = $fila["apellido"];
    echo "Bienvenido: " . $nombre . " " . $apellido;
} else {
    echo "No se encontraron datos del usuario";
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>