<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "../Model/categoria.class.php";

$operacion = $_POST["operacion"] ?? '';
$result = null;

if ($operacion === "guardar") {
    $categoria = new Categoria(null, $_POST['nombre']);
    $result = $categoria->guardar();

} elseif ($operacion === "actualizar") {
    $categoria = new Categoria($_POST['id'], $_POST['nombre']);
    $result = $categoria->actualizar();

} elseif ($operacion === "eliminar") {
    $categoria = new Categoria($_POST['id'], null);
    $result = $categoria->eliminar();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Resultado de Operación</title>
  <link rel="stylesheet" href="../css/controller.css">
</head>
<body>
  <div class="resultado">
    <?php if ($result): ?>
      <p class="exito">✅ Operación exitosa.</p>
    <?php else: ?>
      <p class="error">❌ Operación fallida.</p>
    <?php endif; ?>
    <a href="../listarCategoria.php" class="volver-btn">← Volver al listado</a>
  </div>
</body>
</html>
