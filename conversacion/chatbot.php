<?php
header('Content-Type: application/json');

// Incluye la clase que maneja el guardado de conversaciones
require_once(__DIR__ . "/../Model/conversacion.class.php");

// Incluye la conexión a la base de datos (PDO)
require_once(__DIR__ . "/conexion.php");

// Incluye el archivo de preguntas simples
include "PreguntasSimples.php"; // contiene el array $respuestas

// Capturar y limpiar el mensaje
$data = json_decode(file_get_contents("php://input"), true);
$mensaje = strtolower(trim($data["mensaje"] ?? ""));

// Validar entrada
if (!$mensaje) {
    echo json_encode(["respuesta" => "⚡ No recibí ningún mensaje. ¿Podés intentar de nuevo?"]);
    exit;
}

try {
    // 1. Buscar en la base de datos
    $sql = "SELECT r.respuesta AS respuesta
            FROM preguntas p
            JOIN respuestas r ON r.pregunta_id = p.id
            WHERE LOWER(p.preguntas) LIKE :preguntas
            LIMIT 1";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([':preguntas' => "%$mensaje%"]);
    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
        $respuesta = $fila['respuesta'];
    } else {
        // 2. Buscar en el archivo de preguntas simples
        $respuesta = null;
        foreach ($respuestas as $clave => $valor) {
            similar_text($mensaje, strtolower($clave), $porcentaje);
            if ($porcentaje > 70 || strpos($mensaje, strtolower($clave)) !== false) {
                $respuesta = $valor;
                break;
            }
        }

        // 3. Si no encuentra nada en ningún lado
        if (!$respuesta) {
            $respuesta = "Respuesta no encontrada.";
        }
    }

    // Guardar conversación: primero el usuario, luego el bot
    Conversacion::crear(1, $mensaje); // Usuario
    Conversacion::crear(0, $respuesta); // Bot

    // Devolver respuesta en JSON
    echo json_encode(["respuesta" => $respuesta]);

} catch (PDOException $e) {
    echo json_encode(["respuesta" => "⚡ Error en la consulta: " . $e->getMessage()]);
}

