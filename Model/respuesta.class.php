<?php
require_once "database.class.php";
require_once "preguntas.class.php"; // para usar Pregunta::obtenerPorId

class Respuesta {
    private $id;
    private $respuesta;
    private $pregunta; // en vez de pregunta_id
    private $conexion;

    public function __construct($id = null, $respuesta = null, $pregunta = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta = $pregunta; // puede ser objeto Pregunta o id
        $this->conexion = Database::getInstance()->getConnection();
    }

    // 🔹 Crear
    public function guardar() {
        $sql = "INSERT INTO respuesta (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->respuesta,
            $this->pregunta instanceof Pregunta ? $this->pregunta->getId() : $this->pregunta
        ]);
    }

    // 🔹 Actualizar
    public function actualizar() {
        $sql = "UPDATE respuesta SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->respuesta,
            $this->pregunta instanceof Pregunta ? $this->pregunta->getId() : $this->pregunta,
            $this->id
        ]);
    }

    // 🔹 Eliminar
    public function eliminar() {
        $sql = "DELETE FROM respuesta WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // 🔹 Obtener todas
    public static function obtenerTodxs() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuesta";
        $stmt = $conexion->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $respuestas = [];
        foreach ($resultados as $fila) {
            $pregunta = Pregunta::obtenerPorId($fila['pregunta_id']);
            $respuestas[] = new Respuesta($fila['id'], $fila['respuesta'], $pregunta);
        }
        return $respuestas;
    }

    // 🔹 Obtener por ID
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuesta WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $pregunta = Pregunta::obtenerPorId($fila['pregunta_id']);
            return new Respuesta($fila['id'], $fila['respuesta'], $pregunta);
        }
        return null;
    }

    // 🔹 Buscar por texto de pregunta
    public static function buscar($preguntaTexto) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT r.* 
                FROM respuesta r 
                JOIN preguntas p ON r.pregunta_id = p.id 
                WHERE LOWER(p.texto) LIKE LOWER(?) 
                LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute(["%$preguntaTexto%"]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $pregunta = Pregunta::obtenerPorId($fila['pregunta_id']);
            return new Respuesta($fila['id'], $fila['respuesta'], $pregunta);
        }
        return null;
    }

    // 🔹 Getters y Setters
    public function getId() { return $this->id; }
    public function getTexto() { return $this->respuesta; }
    public function getPregunta() { return $this->pregunta; }

    public function setTexto($respuesta) { $this->respuesta = $respuesta; }
    public function setPregunta($pregunta) { $this->pregunta = $pregunta; }
}
?>
