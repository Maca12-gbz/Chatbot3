<?php
session_start(); // Inicia la sesión para poder destruirla

// Destruye todas las variables de sesión
session_unset();

// Destruye la sesión completamente
session_destroy();

// Redirige al index.php
header("Location: index.php");
exit();
?>