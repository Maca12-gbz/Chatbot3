<?php
require_once(__DIR__ . '/Model/preguntas.class.php');
$preguntas = Pregunta::obtenerTodxs();

$mensaje = '';
if (isset($_GET['exito'])) {
    $mensaje = "✅ Respuesta guardada correctamente.";
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'guardar':
            $mensaje = "❌ Error al guardar la respuesta.";
            break;
        case 'respuesta_vacia':
            $mensaje = "⚠️ El campo respuesta está vacío.";
            break;
        case 'pregunta_vacia':
            $mensaje = "⚠️ Debe seleccionar una pregunta.";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Respuesta</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2 style="text-align: center;">Formulario de Alta de Respuesta</h2>

    <?php if ($mensaje): ?>
      <p class="message"><?= htmlspecialchars($mensaje) ?></p>
    <?php endif; ?>

    <form action="Controller/respuesta.controller.php" method="POST">
        <!-- ahora coincide con el controller -->
        <input type="hidden" name="operacion" value="guardar" />

        <label for="respuesta">Respuesta:</label><br>
        <textarea name="respuesta" id="respuesta" rows="3" cols="50" required></textarea><br><br>

        <label for="pregunta_id">Pregunta asociada:</label><br>
        <select name="pregunta_id" id="pregunta_id" required>
            <option value="">Seleccione</option>
            <?php foreach ($preguntas as $p): ?>
                <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['preguntas']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" aria-label="Agregar Respuesta">Guardar</button>
    </form>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php" aria-label="Volver">← Volver al inicio</a>
</body>
</html>
