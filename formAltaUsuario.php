<?php
require_once("Model/rol.class.php");
$roles = Rol::obtenerTodos();

$mensaje = '';
if (isset($_GET['exito'])) {
    $mensaje = "✅ Usuario guardado correctamente.";
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'guardar':
            $mensaje = "❌ Error al guardar el usuario.";
            break;
        case 'nombre_vacio':
            $mensaje = "⚠️ El campo nombre está vacío.";
            break;
        case 'correo_vacio':
            $mensaje = "⚠️ El campo correo está vacío.";
            break;
        case 'clave_vacia':
            $mensaje = "⚠️ El campo clave está vacío.";
            break;
        case 'rol_vacio':
            $mensaje = "⚠️ Debe seleccionar un rol.";
            break;
    }
}
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

    <?php if ($mensaje): ?>
      <p class="message"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

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
                <option value="<?= htmlspecialchars($rol->getId()) ?>">
                    <?= htmlspecialchars($rol->getNombre()) ?>
                </option>
            <?php endforeach; ?>
        </select>


        <!-- Botón para agregar usuario -->
        <button type="submit" aria-label="Agregar Usuario">Agregar Usuario</button>
    </form>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php" aria-label="Volver">← Volver al inicio</a>
</body>
</html>
