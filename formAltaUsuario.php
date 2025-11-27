<?php
require_once("Model/rol.class.php");
$roles = Rol::obtenerTodxs();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Usuario</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2 style="text-align: center;">Formulario de Alta de Usuario</h2>

    <form action="Controller/usuario.controller.php" method="POST">
        <input type="hidden" name="operacion" value="guardar" />

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required />

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required />

        <label for="clave">Clave:</label>
        <input type="password" name="clave" id="clave" required />

        <label for="rol_id">Rol:</label>
        <select name="rol_id" id="rol_id" required>
            <option value="">Seleccione un rol</option>
            <?php foreach ($roles as $rol): ?>
                <option value="<?= htmlspecialchars($rol['id']) ?>"><?= htmlspecialchars($rol['nombre']) ?></option>
            <?php endforeach; ?>
        </select>

        <!-- Botón para agregar usuario -->
        <button type="submit">Agregar Usuario</button>
    </form>
       <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>
                