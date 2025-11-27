<?php
require_once(__DIR__ . '/Model/preguntas.class.php');
$preguntas = Pregunta::obtenerTodxs();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Respuesta</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2>Alta de Respuesta</h2>
    <form action="Controller/respuesta.controller.php" method="POST">
        <input type="hidden" name="operacion" value="alta" />

        <label for="respuesta">Respuesta:</label><br>
        <textarea name="respuesta" id="respuesta" rows="3" cols="50" required></textarea><br><br>

        <label for="pregunta_id">Pregunta asociada:</label><br>
        <select name="pregunta_id" id="pregunta_id" required>
            <option value="">Seleccione</option>
            <?php foreach ($preguntas as $p): ?>
                <option value="<?= $p['id'] ?>"><?= htmlspecialchars($p['preguntas']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>
    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>