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

  <form action="../Controller/loginController.php" method="POST">
    <input type="hidden" name="action" value="register">
    <label for="email">Email nuevo:</label>
    <input type="email" name="email" required placeholder="nuevo.email@ejemplo.com">

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required placeholder="********">

    <label for="rol">Rol:</label>
    <select name="rol">
      <option value="Usuario Común">Usuario Común</option>
      <option value="Analista">Analista</option>
      <option value="Moderador">Moderador</option>
      <option value="Administrador">Administrador</option>
    </select>

    <button type="submit" class="secondary-btn">Registrar</button>
  </form>

  <hr style="margin:20px 0;">
  <a href="formLogin.php"><button>Volver al Login</button></a>
</main>
</body>
</html>
