<?php
session_start();  // Inicia la sesión

// Verifica si el usuario ha iniciado sesión
if (isset($_SESSION['nombre_usuario'])) {
    $nombre_usuario = strtoupper($_SESSION['nombre_usuario']);
} else {
    // No hay sesión activa, puedes manejar este caso según tus necesidades
    // Por ejemplo, podrías mostrar un mensaje o simplemente dejar el nombre de usuario vacío
    $nombre_usuario = '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Líneas con colores y contenido</title>
    <link rel="stylesheet" type="text/css" href="Complementos/Css/EstilosMain.css">

    <script>
        function crearCirculo(nombreUsuario) {
            const circleContainer = document.getElementById('circle-container');
            const initials = obtenerIniciales(nombreUsuario);

            const circle = document.createElement('div');
            circle.classList.add('circle');
            circle.innerHTML = `<div class="initials">${initials}</div>`;

            circleContainer.innerHTML = '';
            circleContainer.appendChild(circle);
        }

        function obtenerIniciales(nombreCompleto) {
            const nombres = nombreCompleto.split(' ');
            const primerApellido = nombres[0][0];
            const primerNombre = nombres[2][0]; // Cambiado para obtener la inicial del primer nombre
            return primerApellido + primerNombre;
        }

        function showOptions(button) {
            const optionsContainer = button.nextElementSibling;
            optionsContainer.style.display = optionsContainer.style.display === 'block' ? 'none' : 'block';
        }

        // Oculta las opciones cuando se hace clic en cualquier lugar fuera del botón o de las opciones
        document.addEventListener('click', function(event) {
            const optionsContainers = document.querySelectorAll('.options-container');
            optionsContainers.forEach(function(container) {
                if (!container.contains(event.target)) {
                    container.style.display = 'none';
                }
            });
        });

        // Llama a crearCirculo al cargar la página
        window.onload = function() {
            crearCirculo('<?php echo $nombre_usuario; ?>');
        };
        function mostrarOpciones() {
      var opciones = document.getElementById("opciones");

      // Alternar la visibilidad de las opciones al hacer clic en el botón
      if (opciones.style.display === "none") {
        opciones.style.display = "block";
      } else {
        opciones.style.display = "none";
      }
    }
    </script>
</head>

<body>
        <!-- Primera línea - color gris -->
        
        <div class="line gray-line1">
    <div class="button-container" style="justify-content: flex-end; align-items: center; position: relative;">
        <button onclick="showOptions(this)" style="font-size: 14px; padding: 0px;">
            <span style="font-size: 15px; margin-right: 5px;"><?php echo $nombre_usuario ;?></span>
            <!-- Nuevo contenedor para el círculo -->
            <div id="circle-container"></div>
        </button>
        <!-- Contenedor para las opciones -->



<!-- Contenedor para las opciones -->
      <div id="opciones" class="opciones-container" style="display: none;">
     <a href="Dashboard.php">
     <img src="Complementos/imagenes/dashboardMenu.jpg" alt="Opción 1" style="width: 110px; height: 30; margin-right: 10px;">
             </a>
     <a href="url_de_tu_opcion_2">
        <img src="Complementos/imagenes/gradesMenu.jpg" alt="Opción 2" style="width: 110px; height: 30; margin-right: 60px;">
     </a>
     <a href="url_de_tu_opcion_1">
        <img src="Complementos/imagenes/calendarioMenu.jpg" alt="Opción 3" style="width: 110px; height: 30; margin-right: 60px;">
     </a>
     <a href="LoginPlataforma.php">
        <img src="Complementos/imagenes/logoutMenu.jpg" alt="Opción 4" style="width: 110px; height: 30; margin-right: 60px;">
     </a>
</div>

    </div>
</div>
<div class="line white-line"></div>


</div>



    
    <!-- Segunda línea - color rojo con una imagen -->
    <div class="line red-line">
        <img src="Complementos/imagenes/sistemas.png" alt="Imagen" style="width: 250px; height: auto; margin-left: 20px;">
    </div>

    <!-- Tercera línea - color plomo con botones e imágenes -->
    <div class="line gray-line">
        <div class="button-container1">
            <button onclick="location.href='pagina1.html'" class="left-align">
                <img src="Complementos/imagenes/home.png" alt="Botón 1" style="width: auto; height: auto;">
            </button>
            <button onclick="location.href='Dashboard.php'" class="left-align">
                <img src="Complementos/imagenes/dashboard.png" alt="Botón 2" style="width: auto; height: auto;">
            </button>
            <button onclick="location.href='pagina3.html'" class="left-align">
                <img src="Complementos/imagenes/events.png" alt="Botón 3" style="width: auto; height: auto;">
            </button>
            <button onclick="location.href='pagina4.html'" class="left-align">
                <img src="Complementos/imagenes/courses.png" alt="Botón 4" style="width: auto; height: auto;">
            </button>
        </div>
    </div>
    <div class="line red2-line"></div>
</body>
</html>
