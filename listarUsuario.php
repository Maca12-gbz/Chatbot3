<?php
require_once(__DIR__ . "/Model/usuario.class.php");
require_once(__DIR__ . "/Model/rol.class.php");

$usuarios = Usuario::obtenerTodxs();
$roles = [];
foreach (Rol::obtenerTodxs() as $r) {
    $roles[$r['id']] = $r['nombre'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="css/Formlistar.css"> <!-- Estilo general -->
</head>
<body>
    <h2>Listado de Usuarios</h2>

    <a class="agregar-btn" href="formAltaUsuario.php" aria-label="Agregar nuevo usuario">+ Nuevo Usuario</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($usuarios) > 0): ?>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['id']) ?></td>
                        <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                        <td><?= htmlspecialchars($usuario['email']) ?></td>
                        <td><?= isset($roles[$usuario['rol_id']]) ? htmlspecialchars($roles[$usuario['rol_id']]) : 'Sin rol' ?></td>
                        <td>
                            <a href="formEditarUsuario.php?id=<?= htmlspecialchars($usuario['id']) ?>" class="editar" aria-label="editar usuario">Editar</a>
                            <form action="Controller/usuario.controller.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar este usuario?');">
                                <input type="hidden" name="operacion" value="eliminar" />
                                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']) ?>" />
                                <button type="submit" class="eliminar" aria-label="eliminar usuario">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay usuarios registrados.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php" aria-label="volver a inicio">← Volver al inicio</a>
</body>
</html>
