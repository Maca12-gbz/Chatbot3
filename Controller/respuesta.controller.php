<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "../Model/respuesta.class.php";

$operacion   = $_POST["operacion"]   ?? '';
$respuesta   = $_POST["respuesta"]   ?? '';   // evita el warning
$pregunta_id = $_POST["pregunta_id"] ?? null;
$id          = $_POST["id"]          ?? null;

$result = null;

if ($operacion === "guardar") {
    $res = new Respuesta(null, $respuesta, $pregunta_id);
    $result = $res->guardar();

} elseif ($operacion === "actualizar") {
    $res = new Respuesta($id, $respuesta, $pregunta_id);
    $result = $res->actualizar();

} elseif ($operacion === "eliminar") {
    $res = new Respuesta($id);
    $result = $res->eliminar();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultado de Operación - Respuesta</title>
  <link rel="stylesheet" href="../css/controller.css">
</head>
<body>
  <div class="resultado">
    <?php if ($result): ?>
      <p class="exito">✅ La operación se ejecutó con éxito.</p>
    <?php else: ?>
      <p class="error">❌ La operación no se ejecutó con éxito.</p>
    <?php endif; ?>
    <a href="../listarRespuesta.php" class="volver-btn">← Volver al listado</a>
  </div>
</body>
</html>
