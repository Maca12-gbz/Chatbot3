<?php
require_once("./Model/rol.class.php");
$roles = Rol::obtenerTodxs();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Roles</title>
    <link rel="stylesheet" href="css/Formlistar.css"> <!-- Estilo general -->
</head>
<body>
    <h2>Listado de Roles</h2>

    <?php if (isset($_GET['msg'])): ?>
        <p class="mensaje-exito">
            <?= htmlspecialchars($_GET['msg']) ?>
        </p>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <p class="mensaje-error">
            <?= htmlspecialchars($_GET['error']) ?>
        </p>
    <?php endif; ?>

    <a class="agregar-btn" href="formAltaRol.php">+ Nuevo Rol</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $rol): ?>
                <tr>
                    <td><?= $rol['id'] ?></td>
                    <td><?= htmlspecialchars($rol['nombre']) ?></td>
                    <td>
                        <a href="formEditarRol.php?id=<?= htmlspecialchars($rol['id']); ?>" class="editar">Editar Rol</a>
                        <form action="Controller/rol.controller.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar este rol?');">
                            <input type="hidden" name="operacion" value="eliminar"/>
                            <input type="hidden" name="id" value="<?= $rol['id'] ?>">
                            <button type="submit" class="eliminar">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>
