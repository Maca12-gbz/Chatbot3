<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alta de Rol</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2>Alta de Rol</h2>
    <form action="Controller/rol.controller.php" method="POST">
        <input type="hidden" name="operacion" value="alta" />

        <label for="nombre">Nombre del Rol:</label>
        <input type="text" id="nombre" name="nombre" required />

        <button type="submit">Guardar</button>
    </form>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>
