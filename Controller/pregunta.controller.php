<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/../Model/preguntas.class.php";


$operacion = $_POST["operacion"] ?? '';
$result = null;

if ($operacion === "guardar") {
    $texto = $_POST['texto'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';

    $categoriaObj = Categoria::obtenerPorId($id_categoria);
    $pregunta = new Pregunta(null, $texto, $categoriaObj);
    $result = $pregunta->guardar();

} elseif ($operacion === "actualizar") {
    $id = $_POST['id'] ?? '';
    $texto = $_POST['texto'] ?? '';
    $id_categoria = $_POST['id_categoria'] ?? '';

    $categoriaObj = Categoria::obtenerPorId($id_categoria);
    $pregunta = new Pregunta($id, $texto, $categoriaObj);
    $result = $pregunta->actualizar();

} elseif ($operacion === "eliminar") {
    $id = $_POST['id'] ?? '';
    $pregunta = new Pregunta($id, null, null);
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
