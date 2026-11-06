<?php
/**
 * Callback de Autenticación con Microsoft OAuth / Office 365
 * Plataforma Educativa - Universidad Técnica de Ambato
 */

use myPHPnotes\Microsoft\Auth;
use myPHPnotes\Microsoft\Handlers\Session;
use myPHPnotes\Microsoft\Models\User;

session_start();

if (file_exists(__DIR__ . "/vendor/autoload.php")) {
    require __DIR__ . "/vendor/autoload.php";
}

if (isset($_REQUEST['code']) && class_exists('myPHPnotes\Microsoft\Auth')) {
    try {
        $auth = new Auth(
            Session::get("tenant_id"),
            Session::get("client_id"),
            Session::get("client_secret"),
            Session::get("redirect_uri"),
            Session::get("scopes")
        );

        $tokens = $auth->getToken($_REQUEST['code']);
        $accessToken = $tokens->access_token; 
        $auth->setAccessToken($accessToken);

        $user = new User();
        $_SESSION['nombre_usuario'] = $user->data->getDisplayName();
        $_SESSION['correo_usuario'] = $user->data->getUserPrincipalName();

        header("Location: plataformaMain.php");
        exit();
    } catch (Exception $e) {
        error_log("Microsoft Auth Error: " . $e->getMessage());
        echo "Error durante la autenticación con Microsoft.";
    }
} else {
    echo "Parámetro de autorización no recibido o dependencias no instaladas.";
}
?>
