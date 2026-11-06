<?php
/**
 * Proceso de Autenticación con Google OAuth 2.0
 * Plataforma Educativa - Universidad Técnica de Ambato
 */

require_once __DIR__ . '/Configuracion.php';

if (isset($_GET['code']) && isset($client)) {
    try {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        if (!isset($token['error'])) {
            $client->setAccessToken($token['access_token']);

            // Obtener información del perfil
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            $name = $google_account_info->name;

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['nombre_usuario'] = $name;
            $_SESSION['correo_usuario'] = $email;

            header("Location: plataformaMain.php");
            exit();
        }
    } catch (Exception $e) {
        error_log("Google Auth Error: " . $e->getMessage());
    }
}
?>
