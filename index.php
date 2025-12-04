<?php
session_start();
$nombreUsuario = $_SESSION['usuario']['nombre'] ?? null;
?>
  <!DOCTYPE html>
  <html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="Asistente virtual Teclany - Chatbot interactivo de última generación">
    <title>Chatbot3</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/barranavegacion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      padding-top: 80px; /* Ajusta según el alto de tu navbar */
    }
  </style>
  </head>
  <body>

<!-- NAVBAR -->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Pepito Junior</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ms-auto">

          <li class="nav-item">
            <a class="nav-link active" href="index.php">Inicio</a>
          </li>

          <!-- Menú Agregar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Agregar</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="formAltaCategoria.php">Categoría</a></li>
              <li><a class="dropdown-item" href="formAltaPregunta.php">Pregunta</a></li>
              <li><a class="dropdown-item" href="formAltaRespuesta.php">Respuesta</a></li>
              <li><a class="dropdown-item" href="formAltaRol.php">Rol</a></li>
              <li><a class="dropdown-item" href="formAltaUsuario.php">Usuario</a></li>
            </ul>
          </li>

          <!-- Menú Listar -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Listar</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="listarCategoria.php">Categorías</a></li>
              <li><a class="dropdown-item" href="listarPregunta.php">Preguntas</a></li>
              <li><a class="dropdown-item" href="listarRespuesta.php">Respuestas</a></li>
              <li><a class="dropdown-item" href="listarRol.php">Roles</a></li>
              <li><a class="dropdown-item" href="listarUsuario.php">Usuarios</a></li>
            </ul>
          </li>

          <!-- Sesión -->
          <!-- Sesión -->
            <?php if ($nombreUsuario): ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                  <i class="fas fa-user-circle fa-lg text-light"></i>
                  <span class="text-light"><?= htmlspecialchars($nombreUsuario); ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                  <li><a class="dropdown-item" href="Controller/login.controller.php?action=logout">Cerrar sesión</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li class="nav-item">
                <a href="./Login/formLogin.php" class="btn btn-light ms-2">Iniciar sesión</a>
              </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- CONTENIDO PRINCIPAL -->
<main class="container">

  <!-- Carteles de sesión -->
  <?php if (!empty($_GET['msg'])): ?>
    <div id="alert-msg" class="alert alert-success text-center">
      <?= htmlspecialchars($_GET['msg']); ?>
    </div>
  <?php endif; ?>

  <!-- Presentación -->
  <section class="intro-section d-flex justify-content-between align-items-center">
    <div class="intro-text">
      <h1>Pepito Junior</h1>
      <h2>¿Qué es este sistema?</h2>
      <p>
        Este sistema permite gestionar las consultas realizadas por los usuarios. Podés agregar nuevas consultas, ver un listado y recibir respuestas con ayuda de nuestro chatbot.
      </p>
      <h2>Conocé a nuestro asistente: Pepito Junior</h2>
      <p>
        ¡Hola! Soy Pepito, tu asistente virtual. Estoy aquí para ayudarte a gestionar tus consultas de forma eficiente.
      </p>
    </div>
    <div class="intro-mascot">
      <img src="img/mascota.png" alt="Mascota Pepito Junior" class="mascot-large">
    </div>
  </section>

  <!-- Chat -->
  <section class="chat-section mt-4">
    <div class="chat-app">
      <header class="chat-header d-flex justify-content-between align-items-center">
        <div class="chat-avatar" aria-hidden="true">
          <img src="img/mascota.png" alt="Avatar del chatbot" class="chat-avatar">
        </div>
        <div class="chat-title">
          <h1>Junior</h1>
          <p class="status"></p>
        </div>
        <div class="chat-actions">
          <?php if ($nombreUsuario): ?>
            <a href="Controller/login.controller.php?action=logout" class="btn-icon" title="Cerrar sesión" aria-label="Cerrar sesión">
              <i class="fas fa-power-off"></i>
            </a>
          <?php endif; ?>
        </div>
      </header> 

      <main id="chat-container" tabindex="0" role="log" aria-live="polite" aria-label="Mensajes del chat">
        <div class="welcome-message visible">
          <?php if ($nombreUsuario): ?>
            <p>¡Bienvenido a Pepito Junior! <strong><?= htmlspecialchars($nombreUsuario); ?></strong></p>
          <?php else: ?>
            <p>¡Bienvenido a Pepito Junior! Iniciá sesión para comenzar.</p>
          <?php endif; ?>
        </div>
      </main>

      <!-- Input y botones -->
      <div class="input-container">
        <label for="user-input" class="sr-only">Escribe tu mensaje</label>
        <input type="text" id="user-input" placeholder="Escribe aquí tu mensaje" autocomplete="off">
        <button id="send-btn" class="btn-send"><i class="fas fa-bolt"></i></button>
        <button id="record-btn" class="btn-attach"><i class="fas fa-microphone"></i></button>
        <button class="btn-attach"><i class="fas fa-paperclip"></i></button>
      </div>
    </div>
  </section>

    <!-- FOOTER 
    <footer class="footer">
      <div class="footer-content">
        <p>© 2025 Pepito Junior | Asistente virtual</p>
        <p>Desarrollado por Macarena y Vanesa</p>
        <p>PROGRAMACIÓN 7MO I</p>
        <div class="footer-links">
          <a href="#">Política de privacidad</a> |
          <a href="#">Términos de uso</a>
        </div>
      </div>
    </footer> -->

  <!-- SCRIPT -->
<script type="text/javascript">
// ---------------------------
// Elementos del DOM
// ---------------------------
const inputMensaje = document.getElementById("user-input");
const sendBtn = document.getElementById("send-btn");
const micBtn = document.getElementById("record-btn");
const chatContainer = document.getElementById("chat-container");

// ---------------------------
// Funciones auxiliares
// ---------------------------
function escapeHtml(text) {
  return text.replace(/&/g, "&amp;")
             .replace(/</g, "&lt;")
             .replace(/>/g, "&gt;")
             .replace(/"/g, "&quot;")
             .replace(/'/g, "&#039;");
}

function getCurrentTime() {
  const now = new Date();
  return now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

function scrollToBottom() {
  chatContainer.scrollTop = chatContainer.scrollHeight;
}

// ---------------------------
// Mostrar mensajes
// ---------------------------
function mostrarMensajeUsuario(texto) {
  chatContainer.insertAdjacentHTML("beforeend", `
    <div class="message user-message">
      <div class="message-content-wrapper">
        <div class="message-content">${escapeHtml(texto)}</div>
        <div class="message-time">${getCurrentTime()}</div>
      </div>
    </div>
  `);
  scrollToBottom();
}

function mostrarMensajeBot(texto) {
  chatContainer.insertAdjacentHTML("beforeend", `
    <div class="message bot-message">
      <div class="message-avatar"><i class="fas fa-robot"></i></div>
      <div class="message-content-wrapper">
        <div class="message-content">${escapeHtml(texto)}</div>
        <div class="message-time">${getCurrentTime()}</div>
      </div>
    </div>
  `);
  scrollToBottom();
  hablarRespuesta(texto);
}

function mostrarTyping() {
  chatContainer.insertAdjacentHTML("beforeend", '<div class="message bot-message typing-indicator"><div class="message-avatar"><i class="fas fa-robot"></i></div><div class="message-content-wrapper"><div class="typing-dots"><span></span><span></span><span></span></div></div></div>');
  scrollToBottom();
}

function quitarTyping() {
  document.querySelectorAll(".typing-indicator").forEach(el => el.remove());
}

// ---------------------------
// Comunicación con PHP
// ---------------------------
function enviarMensaje(mensaje) {
  mostrarTyping();
    fetch("./Controller/conversacion.controller.php", {
  method: "POST",
  headers: { "Content-Type": "application/json" },
  body: JSON.stringify({ pregunta: mensaje })
  })
  .then(res => res.json())
  .then(data => {
    quitarTyping();
    mostrarMensajeBot(data.respuesta || "No entendí, pregunta de nuevo.");
  })
  .catch(err => {
    quitarTyping();
    mostrarMensajeBot(" Error de conexión.");
    console.error(err);
  });
}

// ---------------------------
// Sintetizador de voz
// ---------------------------
function hablarRespuesta(texto) {
  if (!window.speechSynthesis) return;
  const utterance = new SpeechSynthesisUtterance(texto);
  utterance.lang = "es-ES";
  speechSynthesis.speak(utterance);
}

// ---------------------------
// Reconocimiento de voz
// ---------------------------
let recognition;
if (window.SpeechRecognition || window.webkitSpeechRecognition) {
  recognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
  recognition.lang = "es-ES";
  recognition.continuous = false;

  recognition.onresult = (event) => {
    const transcripcion = event.results[0][0].transcript;
    inputMensaje.value = "";
    mostrarMensajeUsuario(transcripcion);
    enviarMensaje(transcripcion);
  };

  micBtn.addEventListener("click", () => {
    recognition.start();
  });
} else {
  micBtn.addEventListener("click", () => {
    mostrarMensajeBot("Tu navegador no soporta reconocimiento de voz.");
  });
}

// ---------------------------
// Eventos de envío
// ---------------------------
sendBtn.addEventListener("click", () => {
  console.log('entro');
  const mensaje = inputMensaje.value.trim();
  if (mensaje !== "") {
    mostrarMensajeUsuario(mensaje);
    enviarMensaje(mensaje);
    inputMensaje.value = "";
  }
});

inputMensaje.addEventListener("keypress", (e) => {
  if (e.key === "Enter") {
    e.preventDefault();
    sendBtn.click();
  }
});
</script>

<script>
  // Ocultar el cartel después de 3 segundos
  setTimeout(() => {
    const alertBox = document.getElementById('alert-msg');
    if (alertBox) {
      alertBox.style.transition = "opacity 0.5s ease";
      alertBox.style.opacity = "0";
      setTimeout(() => alertBox.remove(), 500);
    }
  }, 3000);
</script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>




