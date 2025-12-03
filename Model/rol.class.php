<?php
require_once __DIR__ . "/database.class.php";

class Rol {
    private $id;
    private $nombre;
    private $conexion;

    public function __construct($id = null, $nombre = null){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->conexion = Database::getInstance()->getConnection();
    }

    // 🔹 Obtener rol por ID
    public static function obtenerPorId($id){
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultado){
            return new Rol($resultado['id'], $resultado['nombre']);
        }
        return null;
    }

    // 🔹 Obtener todos los roles
    public static function obtenerTodos(){
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM roles";
        $stmt = $conexion->query($sql);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $roles = [];
        foreach ($resultados as $fila) {
            $roles[] = new Rol($fila['id'], $fila['nombre']);
        }
        return $roles;
    }

    // 🔹 Actualizar rol
    public function actualizar(){
        $sql = "UPDATE roles SET nombre=? WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->id]);
    }

    // 🔹 Eliminar rol
    public function eliminar(){
        $sql = "DELETE FROM roles WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // 🔹 Guardar rol
    public function guardar(){
        $sql = "INSERT INTO roles (nombre) VALUES (?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre]);
    }

    // 🔹 Getters y Setters
    public function getId(){ return $this->id; }
    public function getNombre(){ return $this->nombre; }
    public function setId($id){ $this->id = $id; }
    public function setNombre($nombre){ $this->nombre = $nombre; }
}
?>
