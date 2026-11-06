<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <link rel="stylesheet" type="text/css" href="Complementos/Css/estilos.css">
    <title>Iniciar Sesión - Plataforma Educativa UTA</title>
</head>
<body style="background-image: url('Complementos/imagenes/FondoLogin.jpg'); background-size: cover; background-position: center; opacity: 1;">

    <div class="center">
        <img src="Complementos/imagenes/BannerLogin.jpg" alt="Banner Universidad Técnica de Ambato">
    </div>  

    <div class="login-container">
        <h2><center>Iniciar Sesión</center></h2>
        <form action="Validacion.php" method="post">
            <input type="text" name="IngresoUsuario" required placeholder="Correo institucional o Usuario" style="font-size: 15px;">
            <input type="password" name="IngresoClave" required placeholder="Contraseña" style="font-size: 15px;">
            <input type="submit" value="Iniciar Sesión" style="font-size: 20px;">
        </form>

        <p style="font-size: 18px; font-family: Arial, sans-serif; text-align: center;">¿Olvidó su contraseña?</p>
        <input type="button" value="Recuperar" style="font-size: 18px;" onclick="alert('Por favor contacte al soporte institucional o administrador del sistema.');">
        
        <p style="font-size: 18px; font-family: Arial, sans-serif; text-align: center;">¿No tiene una cuenta?</p>
        <input type="button" value="Registrarse como Docente" style="font-size: 18px;" onclick="window.location.href ='CreacionRegistroDocente.php';">
        
        <p style="font-size: 18px; font-family: Arial, sans-serif; text-align: center;">Identifíquese utilizando su cuenta en:</p>
        
        <div class="center" style="margin-bottom: 12px;">
            <img src="Complementos/imagenes/GoogleLogo.png" alt="Google Logo" style="vertical-align: middle; margin-right: 10px; width: 40px; height: 40px;">
            <?php
            // Archivo de autenticación de Google
            if (file_exists('Composter/Google/Autentificacion.php')) {
                require_once('Composter/Google/Autentificacion.php');
            }

            if (isset($client) && method_exists($client, 'createAuthUrl')) {
                echo '<a href="' . htmlspecialchars($client->createAuthUrl()) . '" class="google-btn">';
                echo '<span class="btn-text">Iniciar sesión con Google</span>';
                echo '</a>';
            } else {
                echo '<a href="#" onclick="alert(\'Configuración de Google OAuth pendiente en .env\');" class="google-btn">';
                echo '<span class="btn-text">Iniciar sesión con Google</span>';
                echo '</a>';
            }
            ?>
        </div>

        <div class="center">
            <img src="Complementos/imagenes/LogoOutlook.png" alt="Microsoft Logo" style="vertical-align: middle; margin-right: 10px; width: 40px; height: 40px;">
            <a href="RegistroCorreo.php" class="google-btn">
                <span class="btn-text">Iniciar sesión con Microsoft 365</span>
            </a>
        </div>
    </div>

    <div id="offline-banner" style="display: none; position: fixed; bottom: 20px; left: 50%; transform: translateX(-50%); text-align: center; background-color: rgba(0,0,0,0.7); padding: 10px 20px; border-radius: 8px;">
        <p id="offline-message" style="font-size: 18px; color: white; margin: 0;"></p>
        <img src="Complementos/imagenes/Cargando.gif" style="width: 30px; height: auto;" alt="Cargando">
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <img src="Complementos/imagenes/CuadroLogin.jpg" alt="Información institucional" style="width: 100%; max-width: 900px; height: auto;">
    </div>

    <script>
        function checkConnection() {
            var offlineBanner = document.getElementById("offline-banner");
            var offlineMessage = document.getElementById("offline-message");
            var isOnline = navigator.onLine;

            fetch('index.php')
                .then(response => {
                    if (!response.ok || !isOnline) {
                        offlineBanner.style.display = "block";
                        offlineMessage.textContent = "No hay conexión a Internet o con el servidor.";
                    } else {
                        offlineBanner.style.display = "none";
                    }
                })
                .catch(() => {
                    offlineBanner.style.display = "block";
                    offlineMessage.textContent = "No hay conexión a Internet o con el servidor.";
                });
        }

        setInterval(checkConnection, 8000);
    </script>
</body>
</html>
