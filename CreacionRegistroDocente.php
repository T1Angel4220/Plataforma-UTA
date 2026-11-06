<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" type="text/css" href="Complementos/Css/estilosRegistro.css">
    <title>Registro de Plataforma</title>
    <?php
    include("conexion.php");

    if (isset($_POST['registrarse'])) {
        include("DatosDocente.php");
    }
    ?>

    <script>
        function validarCorreo(correo) {
            var regex = /^[a-zA-Z0-9._-]+@(outlook)\.(com)$/;
            return regex.test(correo);
        }

        function validarCedula(cedula) {
            var regex = /^[0-9]{10}$/;
            return regex.test(cedula);
        }

        function validarFormulario() {
            var correo = document.getElementById('correo').value;
            var cedula = document.getElementById('cedula').value;

            if (!validarCorreo(correo)) {
                alert("Por favor, ingrese un correo electrónico válido. Ejemplos válidos: micorreo@outlook.com.");
                return false;
            }

            if (!validarCedula(cedula)) {
                alert("La cédula debe contener exactamente 10 dígitos numéricos.");
                return false;
            }


            return true;
        }

        function permitirSoloNumeros(event) {
            var tecla = event.which || event.keyCode;
            if (tecla < 48 || tecla > 57) {
                event.preventDefault();
            }
        }

        function togglePasswordVisibility() {
            var claveInput = document.getElementById('clave');
            if (claveInput.type === 'password') {
                claveInput.type = 'text';
            } else {
                claveInput.type = 'password';
            }
        }

        function validarLetras(event) {
            var tecla = event.which || event.keyCode;

            // Permitir letras (mayúsculas, minúsculas) y la letra 'ñ' y 'Ñ' (rangos ASCII)
            if (
                (tecla >= 65 && tecla <= 90) ||
                (tecla >= 97 && tecla <= 122) ||
                tecla === 241 || tecla === 209 || // Permitir 'ñ' y 'Ñ'
                tecla === 32 // Permitir espacio en blanco
            ) {
                return true; // Permite la entrada de la letra
            } else {
                event.preventDefault(); // Evita cualquier otro tipo de entrada
            }
        }

        function capitalizarPrimerasLetras(input) {
            var palabras = input.split(' ');
            var resultado = '';
            palabras.forEach(function (palabra) {
                if (palabra.length > 0) {
                    resultado += palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase() + ' ';
                }
            });
            return resultado.trim();
        }

        function capitalizarNombresApellidos() {
            var inputNombres = document.getElementsByName('Nombre1')[0];
            var inputSegundoNombre = document.getElementsByName('Nombre2')[0];
            var inputApellido1 = document.getElementsByName('Apellido1')[0];
            var inputApellido2 = document.getElementsByName('Apellido2')[0];

            inputNombres.value = capitalizarPrimerasLetras(inputNombres.value);
            inputSegundoNombre.value = capitalizarPrimerasLetras(inputSegundoNombre.value);
            inputApellido1.value = capitalizarPrimerasLetras(inputApellido1.value);
            inputApellido2.value = capitalizarPrimerasLetras(inputApellido2.value);
        }
    </script>
</head>
<body style="background-image: url('Complementos/imagenes/Registro.jpg'); background-size: cover; background-position: center; opacity: 1;">

<div class="container">
    <form action="" method="POST" class="formulario" onsubmit="return validarFormulario()">
        <h2 class="titulo">REGISTRAR</h2>

        <label for="nombres">Nombres:</label>
        <div class="nombre-container">
            <input type="text" name="Nombre1" placeholder="Primer Nombre" onkeypress="validarLetras(event); capitalizarNombresApellidos()" required maxlength="20">
            <input type="text" name="Nombre2" placeholder="Segundo Nombre" onkeypress="validarLetras(event); capitalizarNombresApellidos()" required maxlength="20">
        </div>
        <label for="apellidos">Apellidos:</label>
        <div class="nombre-container">
            <input type="text" name="Apellido1" placeholder="Primer Apellido" onkeypress="validarLetras(event); capitalizarNombresApellidos()" required maxlength="20">
            <input type="text" name="Apellido2" placeholder="Segundo Apellido" onkeypress="validarLetras(event); capitalizarNombresApellidos()" required maxlength="20">
        </div>

        <label for="cedula">Número de Cédula:</label>
        <input type="text" id="cedula" name="cedula" placeholder="18XXXXXXXX" onkeypress="permitirSoloNumeros(event)" maxlength="10" required><br><br>

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" placeholder="T1_Ing_Mg_Angel" ><br><br>

        <label for="correo">Correo Electrónico:</label>
        <input type="text" id="correo" name="correo" placeholder="micorreo@outlook.com" required><br><br>

        <label for="clave">Contraseña:</label>
        <div style="position: relative;">
            <input type="password" id="clave" name="clave">
            <span style="position: absolute; right: 10px; top: 25%; transform: translateY(-50%); cursor: pointer; font-size: 30px;" onclick="togglePasswordVisibility()">👁</span>
        </div><br><br>


        <input class="boton" type="submit" value="Registrar" name="registrarse">
        <a href="LoginPlataforma.php" style="text-decoration: none;">Salir</a>
    </form>
</div>
</body>
</html>
