<?php
require_once(__DIR__ . '/Model/categoria.class.php');
$categorias = Categoria::obtenerTodxs();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Pregunta</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2>Alta de Pregunta</h2>
    <form action="Controller/pregunta.controller.php" method="POST">
        <input type="hidden" name="operacion" value="alta" />

        <label for="preguntas">Pregunta:</label><br>
        <textarea name="preguntas" id="preguntas" rows="4" cols="50" required></textarea><br><br>

        <label for="categoria_id">Categoría:</label><br>
        <select name="categoria_id" id="categoria_id" required>
            <option value="">Seleccione</option>
            <?php foreach ($categorias as $c): ?>
                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>
    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>