<?php
require_once(__DIR__ . "/Model/usuario.class.php");
require_once(__DIR__ . "/Model/rol.class.php");

// Obtener usuarios y roles
$usuarios = Usuario::obtenerTodos();
$roles = [];
foreach (Rol::obtenerTodos() as $r) {
    $roles[$r->getId()] = $r->getNombre();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="css/Formlistar.css">
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
                        <td><?= htmlspecialchars($usuario->getId()) ?></td>
                        <td><?= htmlspecialchars($usuario->getNombre()) ?></td>
                        <td><?= htmlspecialchars($usuario->getEmail()) ?></td>
                        <td><?= isset($roles[$usuario->getRol()]) ? htmlspecialchars($roles[$usuario->getRol()]) : 'Sin rol' ?></td>
                        <td>
                            <a href="formEditarUsuario.php?id=<?= htmlspecialchars($usuario->getId()) ?>" class="editar" aria-label="editar usuario">Editar</a>
                            <form action="Controller/usuario.controller.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar este usuario?');">
                                <input type="hidden" name="operacion" value="eliminar" />
                                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario->getId()) ?>" />
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

    <a class="volver-btn" href="index.php" aria-label="volver a inicio">← Volver al inicio</a>
</body>
</html>
