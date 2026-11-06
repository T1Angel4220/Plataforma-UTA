<?php

// Array de mensajes preestablecidos con las opciones disponibles
$respuestas = [
    '1' => 'Subir un deber',
    '2' => 'Salir de la plataforma'
];

// Función para mostrar las opciones disponibles
function mostrarOpciones($opciones)
{
    foreach ($opciones as $key => $opcion) {
        echo "$key. $opcion\n";
    }
}

// Función para manejar la elección del usuario
function manejarEleccion($opcion)
{
    switch ($opcion) {
        case '1':
            echo "Para subir un deber, sigue los siguientes pasos: ...\n";
            // Aquí colocas las instrucciones para subir un deber
            break;
        case '2':
            echo "Para salir de la plataforma, sigue los siguientes pasos: ...\n";
            // Aquí colocas las instrucciones para salir de la plataforma
            break;
        default:
            echo "Opción no válida\n";
    }
}

// Inicio del chatbot
echo "¡Bienvenido al chatbot!\n";
mostrarOpciones($respuestas);

// Simulación de la interacción con el usuario
// En un entorno real, puedes usar formularios o un sistema de entrada de texto más interactivo
if (isset($_GET['opcion'])) {
    manejarEleccion($_GET['opcion']);
} else {
    echo "<br> Por favor, elige una opción en la URL (ejemplo: chatbot.php?opcion=1)";
}

?>