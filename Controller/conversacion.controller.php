<?php
header("Content-Type: application/json; charset=UTF-8");

require_once "../Model/conversacion.class.php";
require_once "../Model/respuesta.class.php";


ini_set('display_errors', 0);
error_reporting(E_ALL);


// Obtener el JSON enviado
$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input["pregunta"]) || trim($input["pregunta"]) === "") {
    echo json_encode(["respuesta" => "Por favor, escribí tu pregunta."]);
    exit;
}

$pregunta = trim($input["pregunta"]);

// Buscar primero en BD, luego en preguntas simples
$respuesta = Respuesta::buscar($pregunta) 
             ?: Respuesta::buscarFlexible($pregunta) 
             ?: "Lo siento, no encontré una respuesta relacionada.";

// Guardar conversación
$conversacion = new Conversacion($pregunta, $respuesta);
$conversacion->guardar();

header("Content-Type: application/json; charset=UTF-8");
echo json_encode(["respuesta" => $respuesta]);
exit;

