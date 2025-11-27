<?php
// loginController.php

// 1. Iniciar la sesión para manejar las variables de sesión (usuario logueado, errores, etc.)
session_start();

// 2. Incluir la clase del modelo que maneja la interacción con la base de datos (DB)
// Ajusta esta ruta (__DIR__ . "/../Model/Usuario.class.php") si la ubicación de tu clase Usuario es diferente.
require_once(__DIR__ . "/../Model/Usuario.class.php"); 

// 3. Verificar que la solicitud sea por el método POST (enviada desde el formulario login.php)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 4. Capturar y sanitizar los datos del formulario
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? ''; 
    
    // 5. Validación básica
    if (empty($email) || empty($password)) {
        
        // Almacena el mensaje de error en la sesión y redirige al login
        $_SESSION['login_error'] = "Por favor, ingresa tu email y contraseña.";
        header("Location: ../login.php"); 
        exit;
    }

    // 6. Intentar autenticar al usuario usando la clase del Modelo
    // Se asume que Usuario::autenticar() gestiona la conexión a la DB y la verificación del hash de la contraseña.
    $usuario = Usuario::autenticar($email, $password); 

    if ($usuario !== null) {
        // LOGIN EXITOSO: 
        
        // 7. Establecer variables de sesión
        $_SESSION['user_id'] = $usuario->getId(); // ID del usuario (clave primaria de la DB)
        $_SESSION['user_email'] = $usuario->getEmail(); 
        $_SESSION['logged_in'] = true;

        // 8. Redireccionar al usuario a la página de inicio o dashboard del chatbot
        header("Location: ../index.php"); // Asegúrate de que esta sea la página de inicio de tu chatbot
        exit;
    } else {
        // FALLO EN EL LOGIN: 
        
        // 9. Establecer el mensaje de error y volver a la página de login
        $_SESSION['login_error'] = "Email o contraseña incorrectos. Inténtalo de nuevo.";
        
        header("Location: ../login.php");
        exit;
    }
    
} else {
    // 10. Si alguien intenta acceder directamente a este archivo sin enviar datos POST, lo enviamos al login
    header("Location: ../login.php"); 
    exit;
}
?>