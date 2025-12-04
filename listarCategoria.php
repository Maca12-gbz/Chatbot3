<?php
require_once(__DIR__ . "/Model/categoria.class.php");

$categorias = Categoria::obtenerTodxs();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Categorías</title>
    <link rel="stylesheet" href="css/Formlistar.css"> <!-- Estilo general -->
</head>
<body>
    <h2>Listado de Categorías</h2>

    <a class="agregar-btn" href="formAltaCategoria.php" aria-label="Agregar nueva categoría">+ Nueva Categoría</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre de la Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($categorias) > 0): ?>
                <?php foreach ($categorias as $categoria): ?>
                    <tr>
                        <td><?= htmlspecialchars($categoria->getId()) ?></td>
                        <td><?= htmlspecialchars($categoria->getNombre()) ?></td>
                        <td>
                            <a href="formEditarCategoria.php?id=<?= htmlspecialchars($categoria->getId()) ?>" 
                            class="editar" aria-label="editar categoría">Editar Categoría</a>
                            <form action="Controller/categoria.controller.php" method="POST" style="display:inline;" 
                                onsubmit="return confirm('¿Seguro que querés eliminar esta categoría?');">
                                <input type="hidden" name="operacion" value="eliminar" />
                                <input type="hidden" name="id" value="<?= htmlspecialchars($categoria->getId()) ?>" />
                                <button type="submit" class="eliminar" aria-label="eliminar categoría">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="3">No hay categorías registradas.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php" aria-label="volver al inicio">← Volver al inicio</a>
</body>
</html>
