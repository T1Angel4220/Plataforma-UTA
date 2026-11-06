<?php
/**
 * Configuración de Autenticación con Google API
 * Plataforma Educativa - Universidad Técnica de Ambato
 */

if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} elseif (file_exists(__DIR__ . '/../../vendor/autoload.php')) {
    require_once __DIR__ . '/../../vendor/autoload.php';
}

$clientID = getenv('GOOGLE_CLIENT_ID') ?: 'YOUR_GOOGLE_CLIENT_ID';
$clientSecret = getenv('GOOGLE_CLIENT_SECRET') ?: 'YOUR_GOOGLE_CLIENT_SECRET';
$redirectUri = getenv('GOOGLE_REDIRECT_URI') ?: 'http://localhost/Plataforma-UTA/callback_google.php';

if (class_exists('Google_Client')) {
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");
}
?>
