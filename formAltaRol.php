<?php
$mensaje = '';
if (isset($_GET['exito'])) {
    $mensaje = "✅ Rol guardado correctamente.";
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'guardar':
            $mensaje = "❌ Error al guardar el rol.";
            break;
        case 'nombre_vacio':
            $mensaje = "⚠️ El campo nombre está vacío.";
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Rol</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2 style="text-align: center;">Formulario de Alta de Rol</h2>

    <?php if ($mensaje): ?>
      <p class="message"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <form action="Controller/rol.controller.php" method="POST">
        <!-- Ahora coincide con el controller -->
        <input type="hidden" name="operacion" value="guardar" />

        <label for="nombre">Nombre del Rol:</label>
        <input type="text" id="nombre" name="nombre" required />

        <button type="submit" aria-label="Agregar Rol">Guardar</button>
    </form>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php" aria-label="Volver">← Volver al inicio</a>
</body>
</html>

