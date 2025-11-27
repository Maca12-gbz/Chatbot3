<?php
include "Model/preguntas.class.php";
include "Model/categoria.class.php";

$categorias = Categoria::obtenerTodxs();

if (isset($_GET['id'])) {
    $pregunta = Pregunta::obtenerPorId($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Pregunta</title>
    <link rel="stylesheet" href="css/formEditar.css"> <!-- Estilo general para edición -->
</head>
<body>
    <?php if (!empty($pregunta)): ?>
        <h2>Editar Pregunta</h2>
        <form action="./Controller/pregunta.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar" />

            <label for="id">ID:</label>
            <input type="text" id="id" name="id" value="<?= htmlspecialchars($pregunta->getId()); ?>" readonly />

            <label for="texto">Texto:</label>
            <input type="text" id="texto" name="texto" value="<?= htmlspecialchars($pregunta->getTexto()); ?>" required />

            <label for="id_categoria">Categoría:</label>
            <select id="id_categoria" name="id_categoria" required>
                <?php foreach ($categorias as $categoria): ?>
                    <option value="<?= $categoria['id'] ?>" <?= $categoria['id'] == $pregunta->getIdCategoria() ? 'selected' : '' ?>>
                        <?= htmlspecialchars($categoria['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Guardar Cambios</button>
        </form>

        <!-- Botón volver -->
        <a href="listarPregunta.php" class="volver-btn">← Volver</a>
    <?php else: ?>
        <h2 style="color:red; text-align:center;">No se encontró la pregunta</h2>
        <a href="listarPregunta.php" class="volver-btn">← Volver</a>
    <?php endif; ?>
</body>
</html>

