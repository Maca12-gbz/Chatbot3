<?php
session_start(); // Inicia la sesión

// Destruye todas las variables de sesión
session_unset();

// Destruye la sesión completamente
session_destroy();

// Redirige al index.php con mensaje
header("Location: index.php?msg=Sesión cerrada correctamente");
exit();
?>
