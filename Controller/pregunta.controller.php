<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "../Model/preguntas.class.php";

$operacion = $_POST["operacion"] ?? '';
$result = null;

if ($operacion === "guardar") {
    $pregunta = new Pregunta(null, $_POST['texto'], $_POST['id_categoria']);
    $result = $pregunta->guardar();

} elseif ($operacion === "actualizar") {
    $pregunta = new Pregunta($_POST['id'], $_POST['texto'], $_POST['id_categoria']);
    $result = $pregunta->actualizar();

} elseif ($operacion === "eliminar") {
    $pregunta = new Pregunta($_POST['id'], null, null);
    $result = $pregunta->eliminar();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultado de Operación - Pregunta</title>
  <link rel="stylesheet" href="../css/controller.css">
</head>
<body>
  <div class="resultado">
    <?php if ($result): ?>
      <p class="exito">✅ La operación se ejecutó con éxito.</p>
    <?php else: ?>
      <p class="error">❌ La operación no se ejecutó con éxito.</p>
    <?php endif; ?>
    <a href="../listarPregunta.php" class="volver-btn">← Volver al listado</a>
  </div>
</body>
</html>

