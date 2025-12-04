<?php
require_once "database.class.php";
require_once "categoria.class.php"; // para usar Categoria::obtenerPorId

class Pregunta {
    private $id;
    private $texto;
    private $categoria; // en vez de id_categoria
    private $conexion;

    public function __construct($id = null, $texto = null, $categoria = null) {
        $this->id = $id;
        $this->texto = $texto;
        $this->categoria = $categoria; // puede ser objeto Categoria o id
        $this->conexion = Database::getInstance()->getConnection();
    }

    // 🔹 Obtener por ID
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM preguntas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $categoria = Categoria::obtenerPorId($fila['id_categorias']);
            return new Pregunta($fila['id'], $fila['preguntas'], $categoria);
        }
        return null;
    }

    // 🔹 Obtener todas
    public static function obtenerTodxs() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM preguntas";
        $stmt = $conexion->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $preguntas = [];
        foreach ($resultados as $fila) {
            $categoria = Categoria::obtenerPorId($fila['id_categorias']);
            $preguntas[] = new Pregunta($fila['id'], $fila['preguntas'], $categoria);
        }
        return $preguntas;
    }

    // 🔹 Guardar
    public function guardar() {
        $sql = "INSERT INTO preguntas (preguntas, id_categorias) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->texto,
            $this->categoria instanceof Categoria ? $this->categoria->getId() : $this->categoria
        ]);
    }

    // 🔹 Actualizar
    public function actualizar() {
        $sql = "UPDATE preguntas SET preguntas = ?, id_categorias = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            $this->texto,
            $this->categoria instanceof Categoria ? $this->categoria->getId() : $this->categoria,
            $this->id
        ]);
    }

    // 🔹 Eliminar
    public function eliminar() {
        $sql = "DELETE FROM preguntas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // 🔹 Getters y Setters
    public function getId() { return $this->id; }
    public function getTexto() { return $this->texto; }
    public function getCategoria() { return $this->categoria; }

    public function setId($id) { $this->id = $id; }
    public function setTexto($texto) { $this->texto = $texto; }
    public function setCategoria($categoria) { $this->categoria = $categoria; }
}
?>
