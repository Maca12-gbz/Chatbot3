<?php
session_start();
require_once(__DIR__ . "/../Model/Usuario.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $msg = "Por favor, completa todos los campos.";
        if ($action === 'login') {
            $_SESSION['login_error'] = $msg;
            header("Location: ../Login/formLogin.php");
        } else {
            $_SESSION['register_error'] = $msg;
            header("Location: ../Login/formRegistro.php");
        }
        exit;
    }

    if ($action === 'login') {
        $usuario = Usuario::autenticar($email, $password);
        if ($usuario !== null) {
            $_SESSION['user_id'] = $usuario->getId();
            $_SESSION['user_email'] = $usuario->getEmail();
            $_SESSION['logged_in'] = true;
            header("Location: ../index.php");
        } else {
            $_SESSION['login_error'] = "Email o contraseña incorrectos.";
            header("Location: ../Login/formLogin.php");
        }
        exit;
    }

    if ($action === 'register') {
        $rol = $_POST['rol'] ?? 'Usuario Común';
        $exito = Usuario::registrar($email, $password, $rol);
        if ($exito) {
            $_SESSION['register_success'] = "Usuario registrado correctamente.";
        } else {
            $_SESSION['register_error'] = "Error al registrar usuario.";
        }
        header("Location: ../Login/formRegistro.php");
        exit;
    }
}
header("Location: ../Login/formLogin.php");
exit;
