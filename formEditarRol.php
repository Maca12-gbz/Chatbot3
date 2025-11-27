<?php
include __DIR__ . "/Model/rol.class.php";

if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = intval($_GET["id"]);
    $rol = Rol::obtenerPorId($id);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Rol</title>
    <link rel="stylesheet" href="css/formEditar.css"> <!-- Estilo general para edición -->
</head>
<body>
    <?php if (!empty($rol)): ?>
        <h2>Editar Rol</h2>
        <form action="../chatbot/Controller/rol.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar" />
            <input type="hidden" name="id" value="<?= htmlspecialchars($rol->getId()) ?>" />

            <label for="nombre">Nombre del Rol:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($rol->getNombre()) ?>" required />

            <button type="submit">Guardar Cambios</button>
        </form>

        <!-- Botón volver -->
        <a href="listarRol.php" class="volver-btn">← Volver</a>
    <?php else: ?>
        <p style="color:red; text-align:center;">El ID ingresado no corresponde a ningún rol válido.</p>
        <a href="../chatbot/listarRol.php" class="volver-btn">← Volver</a>
    <?php endif; ?>
</body>
</html>
