<?php
/**
 * Redirección de Autenticación con Microsoft OAuth / Office 365
 * Plataforma Educativa - Universidad Técnica de Ambato
 */

session_start();

if (file_exists(__DIR__ . "/vendor/autoload.php")) {
    require __DIR__ . "/vendor/autoload.php";
}

use myPHPnotes\Microsoft\Auth;

$tenant = getenv('MS_TENANT_ID') ?: 'common'; 
$client_id = getenv('MS_CLIENT_ID') ?: 'YOUR_MICROSOFT_CLIENT_ID';
$client_secret = getenv('MS_CLIENT_SECRET') ?: 'YOUR_MICROSOFT_CLIENT_SECRET';
$callback_url = getenv('MS_REDIRECT_URI') ?: 'http://localhost/Plataforma-UTA/callback.php';

$scopes = ["User.Read"];

if (class_exists('myPHPnotes\Microsoft\Auth')) {
    $microsoft = new Auth($tenant, $client_id, $client_secret, $callback_url, $scopes);
    header("Location: " . $microsoft->getAuthUrl());
    exit;
} else {
    echo "Módulo de autenticación de Microsoft no instalado. Por favor ejecute 'composer install'.";
}
?>
