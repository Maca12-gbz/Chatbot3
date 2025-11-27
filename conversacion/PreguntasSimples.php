<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);
$mensaje = strtolower(trim($data["mensaje"] ?? ""));

// Lista de frases clave y sus respuestas
$respuestas = [
  "hola" => "¡Hola! ¿Cómo estás?",
  "quién sos" => "Soy Pepito Junior, tu asistente virtual brutal.",
  "gracias" => "¡De nada! Estoy para ayudarte.",
  "adiós" => "¡Hasta luego! Que tengas un gran día.",
  "ayudame" => "Claro, ¿en qué tema necesitás ayuda?",
  "no entendí" => "No hay problema, puedo explicarlo de otra forma.",
  "repetilo" => "Te lo repito: ¿qué parte querés que aclare?",
  "cómo se usa" => "Decime qué querés usar y te explico paso a paso.",
  "no sé" => "No te preocupes, estoy acá para ayudarte a entender.",
  "estás ahí" => "Sí, estoy acá. ¿Qué necesitás?",
  "funciona" => "Sí, funciona. ¿Querés que te muestre cómo?"
];

// Función para buscar coincidencia aproximada
function buscarSimilar($mensaje, $frases) {
  foreach ($frases as $clave => $respuesta) {
    similar_text($mensaje, $clave, $porcentaje);
    if ($porcentaje > 70 || strpos($mensaje, $clave) !== false) {
      return $respuesta;
    }
  }
  return null;
}

// Buscar respuesta
$respuesta = buscarSimilar($mensaje, $respuestas) ?? "No entendí bien, ¿podés repetirlo?";

echo json_encode(["respuesta" => $respuesta]);
