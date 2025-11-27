<?php
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

function buscarSimilar($mensaje, $frases) {
    foreach ($frases as $clave => $respuesta) {
        similar_text(strtolower($mensaje), strtolower($clave), $porcentaje);
        if ($porcentaje > 70 || strpos(strtolower($mensaje), strtolower($clave)) !== false) {
            return $respuesta;
        }
    }
    return null;
}
?>

