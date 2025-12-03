<?php
session_start();
$success_message = $_SESSION['register_success'] ?? '';
$error_message = $_SESSION['register_error'] ?? '';
unset($_SESSION['register_success'], $_SESSION['register_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registro de Usuario</title>
  <link rel="stylesheet" href="../css/login.css">
  <!-- Font Awesome para iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<main class="container">
  <h1>Registrar Usuario</h1>

  <?php if ($error_message): ?>
    <p class="message error"><?php echo htmlspecialchars($error_message); ?></p>
  <?php endif; ?>
  <?php if ($success_message): ?>
    <p class="message success"><?php echo htmlspecialchars($success_message); ?></p>
  <?php endif; ?>

  <form action="../Controller/registrar.controller.php" method="POST" onsubmit="return validatePasswords()">
  <input type="hidden" name="action" value="register">

  <label for="nombre">Nombre completo:</label>
  <input type="text" name="nombre" required placeholder="Tu nombre">

  <label for="email">Email:</label>
  <input type="email" name="email" required placeholder="tu.email@ejemplo.com">

  <label for="password">Contraseña:</label>
  <div class="password-wrapper">
    <input type="password" name="password" id="password" required placeholder="********">
    <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password', this)"></i>
  </div>

  <label for="confirm_password">Confirmar contraseña:</label>
  <div class="password-wrapper">
    <input type="password" name="confirm_password" id="confirm_password" required placeholder="********" onkeyup="checkPasswords()">
    <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('confirm_password', this)"></i>
  </div>
  <p id="password-message" class="message error" style="display:none;">Las contraseñas no coinciden</p>

  <button type="submit" class="secondary-btn">Registrar</button>
</form>


  <hr style="margin:20px 0;">
  <a href="formLogin.php"><button>Volver al Login</button></a>
</main>

<script>
function togglePassword(id, icon) {
  const input = document.getElementById(id);
  if (input.type === "password") {
    input.type = "text";
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    input.type = "password";
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}

function checkPasswords() {
  const pass = document.getElementById("password").value;
  const confirm = document.getElementById("confirm_password").value;
  const message = document.getElementById("password-message");

  if (confirm.length > 0) {
    if (pass !== confirm) {
      message.style.display = "block";
    } else {
      message.style.display = "none";
    }
  } else {
    message.style.display = "none";
  }
}

function validatePasswords() {
  const pass = document.getElementById("password").value;
  const confirm = document.getElementById("confirm_password").value;
  if (pass !== confirm) {
    alert("Las contraseñas no coinciden.");
    return false;
  }
  return true;
}
</script>
</body>
</html>
