<?php
require_once(__DIR__ . "/Model/respuesta.class.php");
require_once(__DIR__ . "/Model/preguntas.class.php");

$respuestas = Respuesta::obtenerTodxs();
$preguntas = [];

foreach (Pregunta::obtenerTodxs() as $p) {
    $preguntas[$p['id']] = $p['preguntas'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Respuestas</title>
    <link rel="stylesheet" href="css/Formlistar.css"> <!-- Estilo general -->
</head>
<body>
    <h2>Listado de Respuestas</h2>

    <a class="agregar-btn" href="formAltaRespuesta.php">+ Nueva Respuesta</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Respuesta</th>
                <th>Pregunta Asociada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($respuestas) > 0): ?>
                <?php foreach ($respuestas as $r): ?>
                    <tr>
                        <td><?= htmlspecialchars($r['id']) ?></td>
                        <td><?= htmlspecialchars($r['respuesta']) ?></td>
                        <td><?= isset($preguntas[$r['pregunta_id']]) ? htmlspecialchars($preguntas[$r['pregunta_id']]) : 'Sin pregunta' ?></td>
                        <td>
                            <form action="formEditarRespuesta.php" method="GET" style="display:inline;">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>" />
                               <button type="submit" class="editar">Editar</button>
                            </form>
                            <form action="Controller/respuesta.controller.php" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que querés eliminar esta respuesta?');">
                                <input type="hidden" name="operacion" value="eliminar" />
                                <input type="hidden" name="id" value="<?= htmlspecialchars($r['id']) ?>" />
                                <button type="submit" class="eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5">No hay respuestas registradas.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Botón para volver al inicio -->
    <a class="volver-btn" href="index.php">← Volver al inicio</a>
</body>
</html>
