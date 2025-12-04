<?php
// -------------------------
// CONFIGURACIÓN INICIAL
// -------------------------
header("Content-Type: application/json; charset=UTF-8");

// Mostrar errores en desarrollo (desactivar en producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// -------------------------
// INCLUDES NECESARIOS
// -------------------------
require_once __DIR__ . "/../Model/conversacion.class.php";
require_once __DIR__ . "/../Model/respuesta.class.php";
require_once __DIR__ . "/../preguntasSimples.php"; // debe existir y definir $preguntasSimples y buscarSimilar()

// -------------------------
// LEER JSON DEL FRONTEND
// -------------------------
$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input["pregunta"]) || trim($input["pregunta"]) === "") {
    echo json_encode(["respuesta" => "Por favor, escribí tu pregunta."]);
    exit;
}

$pregunta = trim($input["pregunta"]);

// -------------------------
// BUSCAR RESPUESTA
// -------------------------
$respuesta = null;

// 1. Intentar búsqueda exacta
if (method_exists("Respuesta", "buscar")) {
    $respuesta = Respuesta::buscar($pregunta);
}

// 2. Intentar búsqueda flexible
if (!$respuesta && method_exists("Respuesta", "buscarFlexible")) {
    $respuesta = Respuesta::buscarFlexible($pregunta);
}

// 3. Intentar búsqueda en preguntas simples
if (!$respuesta && function_exists("buscarSimilar") && isset($preguntasSimples)) {
    $respuesta = buscarSimilar($pregunta, $preguntasSimples);
}

// 4. Fallback
if (!$respuesta) {
    $respuesta = "Lo siento, no encontré una respuesta relacionada.";
}

// -------------------------
// GUARDAR CONVERSACIÓN
// -------------------------
if (class_exists("Conversacion")) {
    $conversacion = new Conversacion($pregunta, $respuesta);
    if (method_exists($conversacion, "guardar")) {
        $conversacion->guardar();
    }
}

// -------------------------
// DEVOLVER JSON
// -------------------------
echo json_encode(["respuesta" => $respuesta], JSON_UNESCAPED_UNICODE);
exit;
