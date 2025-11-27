<?php
include __DIR__ . "/Model/categoria.class.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]);
    $categoria = Categoria::obtenerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Categoría</title>
    <link rel="stylesheet" href="css/formEditar.css"> <!-- Estilo general para edición -->
</head>
<body>
    <?php if (!empty($categoria)): ?>
        <h2>Editar Categoría</h2>
        <form action="Controller/categoria.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar" />
            <input type="hidden" name="id" value="<?= htmlspecialchars($categoria->getId()) ?>" />

            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($categoria->getNombre()) ?>" required />

            <button type="submit" aria-label="Guardar Cambios" >Guardar Cambios</button>
        </form>

        <!-- Botón volver -->
        <a href="listarCategoria.php" class="volver-btn" aria-label="Volver">← Volver</a>
    <?php else: ?>
        <p style="color:red; text-align:center;">El ID ingresado no corresponde a ninguna categoría válida.</p>
        <a href="../chatbot/listarCategoria.php" class="volver-btn">← Volver</a>
    <?php endif; ?>
</body>
</html>
