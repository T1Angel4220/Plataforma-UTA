<?php
/**
 * Punto de entrada principal - Plataforma Educativa UTA
 */

// Si es una verificación de conectividad por fetch o similar, retorna 200 OK
if (isset($_SERVER['HTTP_SEC_FETCH_DEST']) && $_SERVER['HTTP_SEC_FETCH_DEST'] === 'empty') {
    http_response_code(200);
    echo "OK";
    exit();
}

// Redireccionar al login de la plataforma
header("Location: LoginPlataforma.php");
exit();
?>
