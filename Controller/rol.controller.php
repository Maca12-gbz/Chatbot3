<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "../Model/rol.class.php";

$operacion = $_POST["operacion"] ?? '';
$result = null;

if ($operacion === "guardar") {
    $rol = new Rol(null, $_POST['nombre']);
    $result = $rol->guardar();

} elseif ($operacion === "actualizar") {
    $rol = new Rol($_POST['id'], $_POST['nombre']);
    $result = $rol->actualizar();

} elseif ($operacion === "eliminar") {
    $rol = new Rol($_POST['id']);
    $result = $rol->eliminar();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultado de Operación - Rol</title>
  <link rel="stylesheet" href="../css/controller.css">
</head>
<body>
  <div class="resultado">
    <?php if ($result): ?>
      <p class="exito">✅ La operación se ejecutó con éxito.</p>
    <?php else: ?>
      <p class="error">❌ La operación no se ejecutó con éxito.</p>
    <?php endif; ?>
    <a href="../listarRol.php" class="volver-btn">← Volver al listado</a>
  </div>
</body>
</html>
