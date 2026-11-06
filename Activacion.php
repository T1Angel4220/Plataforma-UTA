<?php
session_start();
include("conexion.php");

$mensaje = "";
$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo_verificacion'])) {
    $codigoIngresado = trim($_POST['codigo_verificacion']);
    $codigoGuardado = isset($_SESSION['codigo_verificacion']) ? trim($_SESSION['codigo_verificacion']) : '';

    if (!empty($codigoGuardado) && strcmp($codigoIngresado, $codigoGuardado) === 0) {
        // Actualizar estado en la base de datos si hay usuario en sesión
        if (isset($_SESSION['usuario_registro'])) {
            $userReg = $conexion->real_escape_string($_SESSION['usuario_registro']);
            $conexion->query("UPDATE logindocente SET id_Activo = 1 WHERE id_NombreUsuario = '$userReg'");
        }
        header("Location: RegistroExitosoDocente.php");
        exit();
    } else {
        // En modo demostración / portfolio, aceptar también si coincide o si se usa código demo
        if ($codigoIngresado === '123456' || (empty($codigoGuardado) && strlen($codigoIngresado) >= 4)) {
            header("Location: RegistroExitosoDocente.php");
            exit();
        }
        $mensaje = "Código de verificación incorrecto. Inténtelo nuevamente.";
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Cuenta - Plataforma Educativa UTA</title>
    <link rel="stylesheet" type="text/css" href="Complementos/Css/estilosRegistro.css">
    <style>
        .box {
            max-width: 450px;
            margin: 80px auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .box h2 {
            color: #ad272e;
            margin-bottom: 15px;
        }
        .box p {
            color: #555;
            font-size: 15px;
        }
        .box input[type="text"] {
            width: 80%;
            padding: 12px;
            font-size: 18px;
            text-align: center;
            letter-spacing: 4px;
            margin: 20px 0;
            border: 2px solid #ad272e;
            border-radius: 4px;
        }
        .box input[type="submit"] {
            background-color: #ad272e;
            color: white;
            border: none;
            padding: 12px 30px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.3s;
        }
        .box input[type="submit"]:hover {
            background-color: #851e23;
        }
        .alerta {
            color: #d9534f;
            margin-top: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body style="background-image: url('Complementos/imagenes/Registro.jpg'); background-size: cover; background-position: center;">
    <div class="box">
        <h2>Activación de Cuenta</h2>
        <p>Hemos generado un código de verificación para validar su cuenta docente.</p>
        <p><small>(Código de prueba para demostración: <strong>123456</strong>)</small></p>

        <?php if (!empty($mensaje)): ?>
            <div class="alerta"><?php echo htmlspecialchars($mensaje); ?></div>
        <?php endif; ?>

        <form action="Activacion.php" method="POST">
            <input type="text" id="codigo" name="codigo_verificacion" placeholder="Código" required maxlength="10">
            <br>
            <input type="submit" value="Verificar y Activar">
        </form>
    </div>
</body>
</html>
