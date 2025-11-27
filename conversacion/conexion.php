<?php
define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");
define("DB", "chatbot");

try {
    $pdo = new PDO("mysql:host=localhost;port=3306;dbname=chatbot;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    echo "❌ Error de conexión: " . $e->getMessage();
}

?>