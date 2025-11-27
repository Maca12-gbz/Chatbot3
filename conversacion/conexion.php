<?php
define("SERVIDOR", "localhost");
define("USUARIO", "root");
define("PASSWORD", "");
define("DB", "chatbot");

try {
    $pdo = new PDO(
        "mysql:host=" . SERVIDOR . ";dbname=" . DB . ";charset=utf8mb4",
        USUARIO,
        PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    // NO imprimimos nada aquí
    // Solo lanzamos excepción para que chatbot.php la maneje
    throw $e;
}
?>
