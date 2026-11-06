<?php
session_start(); // Inicia la sesión al principio del archivo

function generateRandomCode() {
    $code = '';
    $length = 6;

    for ($i = 0; $i < $length; $i++) {
        $code .= rand(0, 9);
    }

    return $code;
}

$codigo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $nombre = "Nombre predefinido";

    if (!empty($email)) {
        $destino = $email;
        $asunto = 'Confirma Tu Registro';

        $codigo = uniqid(); // Usa uniqid() para generar un código único

        // Almacena el código en la sesión
        $_SESSION['codigo_verificacion'] = $codigo;

        $cuerpo = '<html>...</html>'; // HTML del correo

        $headers = "MIME-Version: 1.0\r\n...";
        
        mail($destino, $asunto, $cuerpo, $headers);
        echo "Email enviado correctamente";
    } else {
        echo "Error al enviar el mail";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo_verificacion'])) {
    $codigoIngresado = $_POST['codigo_verificacion'];

    // Obtén el código de verificación almacenado en la sesión
    $codigoGuardado = isset($_SESSION['codigo_verificacion']) ? $_SESSION['codigo_verificacion'] : '';

    if (strcmp($codigoIngresado, $codigoGuardado) === 0) {
        echo "Su cuenta ha sido verificada";
    } else {
        echo "Código incorrecto";
    }
}
?>
