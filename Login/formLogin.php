<?php
session_start();
$error_message = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);

$success_message = $_GET['msg'] ?? '';
$email_value = $_SESSION['old_email'] ?? '';
unset($_SESSION['old_email']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<main class="container">
  <h1>Iniciar Sesión</h1>

  <?php if ($error_message): ?>
    <p class="message error"><?= htmlspecialchars($error_message); ?></p>
  <?php endif; ?>

  <?php if (!empty($success_message)): ?>
    <p class="message success"><?= htmlspecialchars($success_message); ?></p>
  <?php endif; ?>

  <form action="../Controller/login.controller.php" method="POST">
    <input type="hidden" name="action" value="login">

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($email_value); ?>" required placeholder="tu.email@ejemplo.com">

    <label for="password">Contraseña:</label>
    <div class="password-wrapper">
      <input type="password" name="password" id="login_password" required placeholder="********">
      <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('login_password', this)"></i>
    </div>

    <button type="submit">Ingresar</button>
  </form>

  <hr style="margin:20px 0;">
  <a href="formRegistro.php"><button class="secondary-btn">Registrar nuevo usuario</button></a>

  <div class="volver-separado">
    <a href="../index.php"><button class="volver-btn">← Volver al inicio</button></a>
  </div>
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
</script>
</body>
</html>
