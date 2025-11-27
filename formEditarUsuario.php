<?php
include "Model/usuario.class.php";
include "Model/rol.class.php";

$Usu = null;
if (isset($_GET['id'])) {
    $Usu = Usuario::obtenerPorId($_GET['id']);
}
$roles = Rol::obtenerTodxs();
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
            <input type="hidden" name="id" value="<?= htmlspecialchars($Usu->getId()); ?>" />

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($Usu->getNombre()); ?>" required />

            <label for="correo">Email:</label>
            <input type="email" id="correo" name="correo" value="<?= htmlspecialchars($Usu->getMail()); ?>" required />

            <label for="clave">Clave:</label>
            <input type="password" id="clave" name="clave" value="<?= htmlspecialchars($Usu->getClave()); ?>" required />

            <label for="rol_id">Rol:</label>
            <select id="rol_id" name="rol_id" required>
                <option value="">Seleccione un rol</option>
                <?php foreach ($roles as $rol): ?>
                    <option value="<?= $rol['id'] ?>" <?= $Usu->getRol() == $rol['id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($rol['nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" aria-label="guardar cambios">Guardar Cambios</button>
        </form>

        <!-- Botón volver -->
        <a href="listarUsuario.php" class="volver-btn" aria-label="volver">← Volver</a>
    <?php else: ?>
        <h2 style="color:red; text-align:center;">No se ha encontrado el usuario</h2>
        <a href="listarUsuario.php" class="volver-btn">← Volver</a>
    <?php endif; ?>
</body>
</html>
