<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Chatbot</title>

</head>
<body>
<style>
body {
    font-family: Arial, sans-serif;
}

.chatbot-container {
    position: relative;
}

#chatbot-button {
    border: none;
    background: none;
    cursor: pointer;
}

.chatbot-options {
    display: none;
    position: absolute;
    top: -150px; /* Esto oculta inicialmente el cuadro de diálogo */
    right: 0;
    background-color: #f9f9f9;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.chatbot-options form {
    margin-bottom: 10px;
}

#chatbot-button img {
    width: 40px; /* Ajusta el tamaño del icono según tus necesidades */
}

</style>
  <script>
     document.addEventListener('DOMContentLoaded', function () {
     const chatbotButton = document.getElementById('chatbot-button');
     const chatbotOptions = document.querySelector('.chatbot-options');

      chatbotButton.addEventListener('click', function () {
        chatbotOptions.style.display = (chatbotOptions.style.display === 'block') ? 'none' : 'block';
        chatbotOptions.style.top = (chatbotOptions.style.top === '0px') ? '-150px' : '0px';
      });
     });
  </script>
    <h1>Chatbot</h1>
    <div class="chatbot-container">
        <button id="chatbot-button" title="Asistente Virtual">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="#ad272e" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM20 16H5.17L4 17.17V4H20V16ZM7 9H17V11H7V9ZM7 6H17V8H7V6ZM7 12H14V14H7V12Z"/>
            </svg>
        </button>
        <div class="chatbot-options">
            <form action="chatbot.php" method="GET">
                <input type="hidden" name="opcion" value="1">
                <button type="submit">Subir un deber</button>
            </form>

            <form action="chatbot.php" method="GET">
                <input type="hidden" name="opcion" value="2">
                <button type="submit">Salir de la plataforma</button>
            </form>
        </div>
    </div>

</body>
</html>