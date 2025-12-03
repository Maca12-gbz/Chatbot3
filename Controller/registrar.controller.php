<?php
session_start();
require_once(__DIR__ . "/../Model/usuario.class.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';

    if (empty($nombre) || empty($email) || empty($password) || empty($confirm)) {
        $_SESSION['register_error'] = "Por favor, completá todos los campos.";
        header("Location: ../Login/formRegistro.php");
        exit;
    }

    if ($password !== $confirm) {
        $_SESSION['register_error'] = "Las contraseñas no coinciden.";
        header("Location: ../Login/formRegistro.php");
        exit;
    }

    $rol = 6; // Usuario Común
    $nuevoUsuario = new Usuario(null, $nombre, $email, $password, $rol);

    if ($nuevoUsuario->guardar()) {
        $_SESSION['register_success'] = "Usuario registrado correctamente.";
        $_SESSION['user_id'] = $nuevoUsuario->getId();
        $_SESSION['user_email'] = $nuevoUsuario->getEmail();
        $_SESSION['logged_in'] = true;
        header("Location: ../index.php");
    } else {
        $_SESSION['register_error'] = "Error al registrar usuario.";
        header("Location: ../Login/formRegistro.php");
    }
    exit;
}
