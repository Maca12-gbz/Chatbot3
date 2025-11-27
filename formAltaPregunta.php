<?php
require_once(__DIR__ . '/Model/categoria.class.php');
$categorias = Categoria::obtenerTodxs();

$mensaje = '';
if (isset($_GET['exito'])) {
    $mensaje = "✅ Pregunta guardada correctamente.";
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'guardar':
            $mensaje = "❌ Error al guardar la pregunta.";
            break;
        case 'texto_vacio':
            $mensaje = "⚠️ El campo pregunta está vacío.";
            break;
        case 'categoria_vacia':
            $mensaje = "⚠️ Debe seleccionar una categoría.";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Pregunta</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2 style="text-align: center;">Formulario de Alta de Pregunta</h2>

    <?php if ($mensaje): ?>
      <p class="message"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <form action="Controller/pregunta.controller.php" method="POST">
        <!-- ahora coincide con el controller -->
        <input type="hidden" name="operacion" value="guardar" />

        <label for="texto">Pregunta:</label><br>
        <textarea name="texto" id="texto" rows="4" cols="50" required></textarea><br><br>

        <label for="id_categoria">Categoría:</label><br>
        <select name="id_categoria" id="id_categoria" required>
            <option value="">Seleccione</option>
            <?php foreach ($categorias as $c): ?>
                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" aria-label="Agregar pregunta">Guardar</button>
    </form>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php" aria-label="volver">← Volver al inicio</a>
</body>
</html>
