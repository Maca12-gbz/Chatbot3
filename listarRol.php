<?php
require_once("./Model/rol.class.php");
$roles = Rol::obtenerTodos();
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

    <a class="agregar-btn" href="formAltaRol.php" aria-label="Agregar nuevo rol">+ Nuevo Rol</a>

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
                    <td><?= htmlspecialchars($rol->getId()) ?></td>
                    <td><?= htmlspecialchars($rol->getNombre()) ?></td>
                    <td>
                        <a href="formEditarRol.php?id=<?= htmlspecialchars($rol->getId()); ?>" class="editar" aria-label="editar rol">Editar Rol</a>
                        <form action="Controller/rol.controller.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar este rol?');">
                            <input type="hidden" name="operacion" value="eliminar"/>
                            <input type="hidden" name="id" value="<?= htmlspecialchars($rol->getId()) ?>">
                            <button type="submit" class="eliminar" aria-label="eliminar rol">Eliminar</button>
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
