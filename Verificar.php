<?php
include("conexion.php");

if (isset($_GET['code'])) {
    $verificationCode = $_GET['code'];

    // Verify the code in the database
    $result = $conexion->query("SELECT * FROM docentes WHERE verification_code = '$verificationCode'");

    if ($result->num_rows > 0) {
        // Update user status to 'verified'
        $update = $conexion->query("UPDATE docentes SET status = 'verified' WHERE verification_code = '$verificationCode'");

        if ($update) {
            echo "Tu cuenta ha sido verificada correctamente. Puedes iniciar sesión.";
        } else {
            echo "Error al verificar la cuenta. Por favor, contacta al soporte.";
        }
    } else {
        echo "Código de verificación inválido.";
    }
} else {
    echo "Código de verificación no proporcionado.";
}
?>