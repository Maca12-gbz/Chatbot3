<?php
require_once("./Model/preguntas.class.php");
require_once("./Model/respuesta.class.php");

// Validación estricta del ID
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die('<div class="error-alert">Error: ID de respuesta no válido</div>');
}

$id = (int)$_GET['id'];
$respuestaObj = Respuesta::obtenerPorId($id);

if (!$respuestaObj) {
    die('<div class="error-alert">Error: La respuesta solicitada no existe</div>');
}

$preguntas = Pregunta::obtenerTodxs();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Respuesta | Sistema de FAQs</title>
    <link rel="stylesheet" href="css/formEditar.css"> <!-- Estilo general para edición -->
</head>
<body>
    <div class="form-container">
        <h2>Editar Respuesta</h2>
        
        <form action="./Controller/respuesta.controller.php" method="POST" autocomplete="off">
            <input type="hidden" name="operacion" value="actualizar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($respuestaObj->getId(), ENT_QUOTES, 'UTF-8') ?>">
            
            <div class="form-group">
                <label for="respuesta">Texto de la respuesta</label>
                <input 
                    type="text" 
                    name="texto" 
                    id="respuesta" 
                    required
                    placeholder="Escriba la respuesta completa"
                    value="<?= htmlspecialchars($respuestaObj->getTexto(), ENT_QUOTES, 'UTF-8') ?>"
                >
            </div>
            
            <div class="form-group">
                <label for="pregunta_id">Pregunta asociada</label>
                <select name="pregunta_id" id="pregunta_id" required>
                    <option value="" disabled>-- Seleccione una pregunta --</option>
                    <?php foreach ($preguntas as $pregunta): ?>
                        <option 
                            value="<?= htmlspecialchars($pregunta['id'], ENT_QUOTES, 'UTF-8') ?>"
                            <?= $pregunta['id'] == $respuestaObj->getPreguntaId() ? 'selected' : '' ?>
                        >
                            <?= htmlspecialchars($pregunta['preguntas'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <button type="submit" aria-label="Guardar Cambios">Guardar Cambios</button>
        </form>

        <!-- Botón volver -->
        <a href="listarRespuesta.php" class="volver-btn" aria-label="Volver">← Volver</a>
    </div>
</body>
</html>
