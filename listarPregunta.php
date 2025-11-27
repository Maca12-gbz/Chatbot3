<?php
require_once(__DIR__ . "/Model/preguntas.class.php");
require_once(__DIR__ . "/Model/categoria.class.php");

$preguntas = Pregunta::obtenerTodxs();
$categorias = [];

foreach (Categoria::obtenerTodxs() as $c) {
    $categorias[$c['id']] = $c['nombre'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Preguntas</title>
    <link rel="stylesheet" href="css/Formlistar.css"> <!-- Estilo general -->
</head>
<body>
    <h2>Listado de Preguntas</h2>

    <a class="agregar-btn" href="formAltaPregunta.php">+ Nueva Pregunta</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pregunta</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($preguntas) > 0): ?>
                <?php foreach ($preguntas as $pregunta): ?>
                    <tr>
                        <td><?= htmlspecialchars($pregunta['id']) ?></td>
                        <td><?= htmlspecialchars($pregunta['preguntas']) ?></td>
                        <td><?= isset($categorias[$pregunta['categoria_id']]) ? htmlspecialchars($categorias[$pregunta['categoria_id']]) : 'Sin categoría' ?></td>
                        <td>
                            <form action="formEditarPregunta.php" method="GET" style="display:inline;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($pregunta['id']) ?>" />
                               <button type="submit" class="editar">Editar</button>
                            </form>
                            <form action="Controller/pregunta.controller.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar esta pregunta?');">
                                <input type="hidden" name="operacion" value="eliminar" />
                                <input type="hidden" name="id" value="<?= htmlspecialchars($pregunta['id']) ?>" />
                                <button type="submit" class="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">No hay preguntas registradas.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>
