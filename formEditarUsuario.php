<?php
include "Model/usuario.class.php";

if (isset($_GET['id'])) {
    $Usu = Usuario::obtenerPorId($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="css/formEditar.css"> <!-- Estilo general para edición -->
</head>
<body>
    <?php if (!empty($Usu)): ?>
        <h2>Editar Usuario</h2>
        <form name="formEditarUsuario" action="./Controller/usuario.controller.php" method="POST">
            <input type="hidden" name="operacion" value="actualizar" />

            <label for="id">ID del Usuario</label>
            <input type="text" id="id" name="id" value="<?= htmlspecialchars($Usu->getId()); ?>" readonly />

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($Usu->getNombre()); ?>" required />

            <label for="mail">Email:</label>
            <input type="email" id="mail" name="mail" value="<?= htmlspecialchars($Usu->getMail()); ?>" required />

            <label for="clave">Clave:</label>
            <input type="password" id="clave" name="clave" value="<?= htmlspecialchars($Usu->getClave()); ?>" required />

            <label for="rol_id">Rol:</label>
            <input type="text" id="rol_id" name="rol_id" value="<?= htmlspecialchars($Usu->getRol()); ?>" required />

            <button type="submit">Guardar Cambios</button>
        </form>

        <!-- Botón volver -->
        <a href="listarUsuario.php" class="volver-btn">← Volver</a>
    <?php else: ?>
        <h2 style="color:red; text-align:center;">No se ha encontrado el usuario</h2>
        <a href="listarUsuario.php" class="volver-btn">← Volver</a>
    <?php endif; ?>
</body>
</html>
