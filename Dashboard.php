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
    <style>
        /* Estilos CSS para las líneas */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .line {
            height: 50px;
            width: 100%;
            display: flex;
            align-items: center;
        }

        .gray-line {
            background-color: #434343;
            height: 40px;


        }
        .gray-line1 {
            background-color: #434343;
            height: 40px;

        }

        .red-line {
            background-color: #ad272e;
            height: 108px;
        }

        .white-line {
            background-color: #FFFFFF;
            height: 1px;
        }

        .red2-line {
            background-color: #ad272e;
            height: 2.5px;
        }

        .button-container {
            display: flex;
            justify-content: flex-start; /* Alineación a la izquierda */
            padding: 0 20px;
            width: 100%; /* Ocupar todo el ancho disponible */
        }
        .button-container1 {
            display: flex;
            justify-content: flex-start; /* Alineación a la izquierda */
            padding: 0 20px;
            width: 100%; /* Ocupar todo el ancho disponible */
        }

        .button-container button {
            background-color: #434343;
            color: #FFFFFF;
            padding: 2.5px 20px;
            border: none;
            border-radius: 0px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            height: 40px;

        }
        .button-container1 button {
            background-color: #434343;
            color: #FFFFFF;
            padding: 2.5px 10px;
            border: none;
            border-radius: 0px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            height: 40px;
     
        }


        .button-container button.left-align {
            margin-right: 0px; /* Espacio entre los botones */
        }

        .button-container button img {
            width: auto; /* Ancho automático para permitir el ajuste individual */
            height: 10px; /* Ajusta el alto de la imagen según tu preferencia */
            margin-right: 0px; /* Ajusta el espacio entre la imagen y el texto del botón */
        }

        /* Estilos para el hover en los botones */
        .button-container button:hover {
            background-color: #ad272e;
        }
        
        /* Estilo para el botón azul al hacer clic */
        .button-container button.clicked {
            border-color: blue;
        }

        .button-container1 button.left-align {
            margin-right: 0px; /* Espacio entre los botones */
        }

        .button-container1 button img {
            width: auto; /* Ancho automático para permitir el ajuste individual */
            height: 10px; /* Ajusta el alto de la imagen según tu preferencia */
            margin-right: 5px; /* Ajusta el espacio entre la imagen y el texto del botón */
        }

        /* Estilos para el hover en los botones */
        .button-container1 button:hover {
            background-color: #ad272e;
        }
        
        /* Estilo para el botón azul al hacer clic */
        .button-container1 button.clicked {
            border-color: blue;
        }
        .circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background-color: #FFFFFF;
            color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            margin-right: 20px;
            position: relative;
        }

        .circle .initials {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        #opciones {
      display: none;
        }

        .opciones-container {
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        position: absolute;
        top: 100%;
        right: 20px;
        padding: 21px;
        z-index: 1; /* Asegura que el cuadro esté sobre otros elementos */
        width: 115px;
        }
        .opciones-container a img:hover {
            filter: brightness(90%);
        }
        .dropdown-content {
      display: none;
      position: absolute;
      background-color: #fff; /* Cambiado el color de fondo a blanco */
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border: 1px solid #ccc;
      padding: 10px;
      z-index: 1;
      width: 120px; /* Ajusta el ancho según tus necesidades */
    }

    .dropdown-content a img {
      width: 100%;
      height: auto;
      margin-bottom: 5px;
    }

    </style>
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
            <button onclick="location.href=''" class="left-align">
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
