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