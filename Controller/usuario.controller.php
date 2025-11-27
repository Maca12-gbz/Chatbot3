<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "../Model/usuario.class.php";

$operacion = $_POST["operacion"] ?? '';
$result = null;

if ($operacion == "guardar") {
    $usu = new Usuario(null, $_POST['nombre'], $_POST['correo'], $_POST['clave'], $_POST['rol_id']);
    $result = $usu->guardar();

} elseif ($operacion == "actualizar") {
    $usu = new Usuario($_POST['id'], $_POST['nombre'], $_POST['correo'], $_POST['clave'], $_POST['rol_id']);
    $result = $usu->actualizar();

} elseif ($operacion == "eliminar") {
    $usu = new Usuario($_POST['id']);
    $result = $usu->eliminar();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultado de Operación - Usuario</title>
  <link rel="stylesheet" href="../css/controller.css">
</head>
<body>
  <div class="resultado">
    <?php if ($result): ?>
      <p class="exito">✅ La operación se ejecutó con éxito.</p>
    <?php else: ?>
      <p class="error">❌ La operación no se ejecutó con éxito.</p>
    <?php endif; ?>
    <a href="../listarUsuario.php" class="volver-btn">← Volver al listado</a>
  </div>
</body>
</html>

