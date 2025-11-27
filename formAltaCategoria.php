<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Alta de Categoría</title>
    <link rel="stylesheet" href="css/formAlta.css">
</head>
<body>
    <h2 style="text-align: center;">Formulario de Alta de Categoría</h2>

    <form action="Controller/categoria.controller.php" method="POST">
        <input type="hidden" name="operacion" value="guardar" />

        <label for="nombre">Nombre de la Categoría:</label>
        <input type="text" name="nombre" id="nombre" required />

        <button type="submit">Agregar Categoría</button>
    </form>

    <!-- Botón para volver al index -->
    <a href="index.php" class="btn-volver">← Volver al inicio</a>
</body>
</html>
