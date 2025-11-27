<?php
$mensaje = '';
if (isset($_GET['exito'])) {
    $mensaje = "✅ Categoría guardada correctamente.";
} elseif (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'guardar':
            $mensaje = "❌ Error al guardar la categoría.";
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
    <meta charset="UTF-8" />
    <title>Alta de Categoría</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2 style="text-align: center;">Formulario de Alta de Categoría</h2>

    <?php if ($mensaje): ?>
      <p class="message"><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <form action="Controller/categoria.controller.php" method="POST">
        <input type="hidden" name="operacion" value="guardar" />

        <label for="nombre">Nombre de la Categoría:</label>
        <input type="text" name="nombre" id="nombre" required />

        <button type="submit" aria-label="Agregar Categoria">Agregar Categoría</button>
    </form>

    <!-- Botón para volver al index -->
    <a href="index.php" class="volver-btn" aria-label="Volver">← Volver al inicio</a>
</body>
</html>
