<?php
session_start();
$error_message = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar Sesión</title>
  <link rel="stylesheet" href="../css/login.css">
</head>
<body>

<main class="container">
  <h1>Iniciar Sesión</h1>

  <?php if ($error_message): ?>
    <p class="message error"><?php echo htmlspecialchars($error_message); ?></p>
    <p class="message">¿No tenés cuenta? <a href="formRegistro.php">Registrate aquí</a></p>
  <?php endif; ?>

  <form action="../Controller/loginController.php" method="POST">
    <input type="hidden" name="action" value="login">
    <label for="email">Email:</label>
    <input type="email" name="email" required placeholder="tu.email@ejemplo.com">

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required placeholder="********">

    <button type="submit">Ingresar</button>
  </form>

  <hr style="margin:20px 0;">
  <a href="formRegistro.php"><button class="secondary-btn">Registrar nuevo usuario</button></a>

  <div class="volver-separado">
    <a href="../index.php"><button class="volver-btn">← Volver al inicio</button></a>
  </div>
</main>

</body>
</html>
