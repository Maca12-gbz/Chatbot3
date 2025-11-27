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

    <a class="agregar-btn" href="formAltaCategoria.php">+ Nueva Categoría</a>

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
                        <td><?= htmlspecialchars($categoria['id']) ?></td>
                        <td><?= htmlspecialchars($categoria['nombre']) ?></td>
                        <td>
                           <a href="formEditarCategoria.php?id=<?= htmlspecialchars($categoria['id']) ?>" class="editar">Editar Categoría</a>
                            <form action="Controller/categoria.controller.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar esta categoría?');">
                                <input type="hidden" name="operacion" value="eliminar" />
                                <input type="hidden" name="id" value="<?= htmlspecialchars($categoria['id']) ?>" />
                                <button type="submit" class="eliminar">Eliminar</button>
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
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>
