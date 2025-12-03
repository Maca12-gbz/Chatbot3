<?php
require_once "database.class.php";

class Usuario
{
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $rol;
    private $conexion;

    public function __construct($id = null, $nombre = null, $email = null, $clave = null, $rol = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->clave = $clave;
        $this->rol = $rol;
        $this->conexion = Database::getInstance()->getConnection();
    }

    // 🔹 Crear (guardar usuario con contraseña encriptada)
    public function guardar()
    {
        $sql = "INSERT INTO usuarios (nombre, email, clave, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);

        $hashedPassword = password_hash($this->clave, PASSWORD_DEFAULT);

        $ok = $stmt->execute([$this->nombre, $this->email, $hashedPassword, $this->rol]);

        if ($ok) {
            $this->id = $this->conexion->lastInsertId();
        }

        return $ok;
    }

    // 🔹 Leer (obtener usuario por ID)
    public static function obtenerPorId($id)
    {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            return new Usuario(
                $fila['id'],
                $fila['nombre'],
                $fila['email'],
                $fila['clave'],
                $fila['rol_id']
            );
        }
        return null;
    }

    // 🔹 Leer (obtener todos los usuarios)
    public static function obtenerTodos()
    {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $usuarios = [];
        foreach ($resultados as $fila) {
            $usuarios[] = new Usuario(
                $fila['id'],
                $fila['nombre'],
                $fila['email'],
                $fila['clave'],
                $fila['rol_id']
            );
        }
        return $usuarios;
    }

    // 🔹 Actualizar usuario
    public function actualizar()
    {
        $sql = "UPDATE usuarios SET nombre = ?, email = ?, clave = ?, rol_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);

        // Si la clave ya está encriptada, no la vuelvas a encriptar
        $hashedPassword = password_hash($this->clave, PASSWORD_DEFAULT);

        return $stmt->execute([$this->nombre, $this->email, $hashedPassword, $this->rol, $this->id]);
    }

    // 🔹 Eliminar usuario
    public function eliminar()
    {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

        // 🔹 Autenticación por email y clave
    public static function autenticar($email, $clave)
    {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado && password_verify($clave, $resultado['clave'])) {
            return new Usuario(
                $resultado['id'],
                $resultado['nombre'],
                $resultado['email'],
                $resultado['clave'],
                $resultado['rol_id']
            );
        }
        return null;
    }

    // 🔹 Getters y Setters
    public function getId()      { return $this->id; }
    public function getNombre()  { return $this->nombre; }
    public function getEmail()   { return $this->email; }
    public function getRol()     { return $this->rol; }

    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setEmail($email)   { $this->email = $email; }
    public function setClave($clave)   { $this->clave = $clave; }
    public function setRol($rol)       { $this->rol = $rol; }
}
?>
