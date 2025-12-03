<?php
require_once "database.class.php";
require_once "preguntas.class.php"; // para usar Pregunta::obtenerPorId

class Respuesta {
    private $id;
    private $respuesta;
    private $pregunta_id;
    private $conexion;

    public function __construct($id = null, $respuesta = null, $pregunta_id = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta_id = $pregunta_id;
        $this->conexion = Database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO respuesta (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id]);
    }

    public function actualizar() {
        $sql = "UPDATE respuesta SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM respuesta WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerTodxs() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT r.id, r.respuesta, r.pregunta_id, p.preguntas 
                FROM respuesta r 
                JOIN preguntas p ON r.pregunta_id = p.id";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuesta WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($res) {
            return new Respuesta(
                $res['id'],
                $res['respuesta'],
                $res['pregunta_id']
            );
        }
        return null;
    }

    public static function buscar($preguntaTexto) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT r.respuesta 
                FROM respuesta r 
                JOIN preguntas p ON r.pregunta_id = p.id 
                WHERE LOWER(p.preguntas) LIKE LOWER(?) 
                LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(["%$preguntaTexto%"]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
        return $res ? $res['respuesta'] : null;
    }

    public static function buscarFlexible($pregunta) {
        require __DIR__ . "/../conversacion/preguntasSimples.php";

        // Normalizar la pregunta del usuario
        $preguntaNormalizada = strtolower($pregunta);
        $preguntaNormalizada = str_replace(
            ['á','é','í','ó','ú','ñ'],
            ['a','e','i','o','u','n'],
            $preguntaNormalizada
        );
        $preguntaNormalizada = preg_replace('/[^a-z0-9\s]/', '', $preguntaNormalizada);

        foreach ($preguntasSimples as $clave => $respuesta) {
            $claveNormalizada = strtolower($clave);
            $claveNormalizada = str_replace(
                ['á','é','í','ó','ú','ñ'],
                ['a','e','i','o','u','n'],
                $claveNormalizada
            );
            $claveNormalizada = preg_replace('/[^a-z0-9\s]/', '', $claveNormalizada);

            if (strpos($preguntaNormalizada, $claveNormalizada) !== false) {
                return $respuesta;
            }
        }

        return null;
    }

    public function getId() { return $this->id; }
    public function getTexto() { return $this->respuesta; }
    public function getPreguntaId() { return $this->pregunta_id; }
}

