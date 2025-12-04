<?php
header("Content-Type: application/json; charset=UTF-8");
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . "/../Model/conversacion.class.php";
require_once __DIR__ . "/../Model/respuesta.class.php";
require_once __DIR__ . "/preguntasSimples.php"; // array $preguntasSimples

// -------------------------
// LEER JSON DEL FRONTEND
// -------------------------
$input = json_decode(file_get_contents("php://input"), true);
$preguntaOriginal = trim($input["pregunta"] ?? "");

if ($preguntaOriginal === "") {
    echo json_encode(["respuesta" => "Por favor, escribí tu pregunta."]);
    exit;
}

// -------------------------
// BUSCAR RESPUESTA
// -------------------------
$respuesta = Respuesta::buscar($preguntaOriginal) 
             ?: Respuesta::buscarFlexible($preguntaOriginal) 
             ?: buscarPreguntaSimple($preguntaOriginal, $preguntasSimples) 
             ?: "Lo siento, no encontré una respuesta relacionada.";

// -------------------------
// GUARDAR CONVERSACIÓN
// -------------------------
$conversacion = new Conversacion($preguntaOriginal, $respuesta);
$conversacion->guardar();

// -------------------------
// DEVOLVER JSON
// -------------------------
echo json_encode(["respuesta" => $respuesta]);
exit;


// -------------------------
// FUNCIÓN AUXILIAR
// -------------------------
function buscarPreguntaSimple($pregunta, $arrayPreguntas) {
    $pregunta = strtolower(trim($pregunta));
    foreach ($arrayPreguntas as $clave => $resp) {
        if (strpos($pregunta, strtolower($clave)) !== false) {
            return $resp;
        }
    }
    return null;
}


