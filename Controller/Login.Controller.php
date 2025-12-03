
<?php
session_start();
require_once(__DIR__ . "/../Model/usuario.class.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // LOGIN
    if ($action === 'login') {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $_SESSION['login_error'] = "Por favor, completa todos los campos.";
            $_SESSION['old_email'] = $email;
            header("Location: ../Login/formLogin.php");
            exit;
        }

        $usuario = Usuario::autenticar($email, $password);

        if ($usuario !== null) {
            $_SESSION['usuario'] = [
                'id'     => $usuario->getId(),
                'nombre' => $usuario->getNombre(),
                'email'  => $usuario->getEmail(),
                'rol'    => $usuario->getRol()
            ];
            header("Location: ../index.php?msg=Sesión iniciada correctamente");
            exit;
        } else {
            $_SESSION['login_error'] = "Email o contraseña incorrectos.";
            $_SESSION['old_email'] = $email;
            header("Location: ../Login/formLogin.php");
            exit;
        }
    }

    // REGISTRO
    if ($action === 'register') {
        $nombre   = $_POST['nombre'] ?? '';
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';

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

        $rol = 6; // rol fijo
        $nuevoUsuario = new Usuario(null, $nombre, $email, $password, $rol);

        if ($nuevoUsuario->guardar()) {
            $_SESSION['usuario'] = [
                'id'     => $nuevoUsuario->getId(),
                'nombre' => $nuevoUsuario->getNombre(),
                'email'  => $nuevoUsuario->getEmail(),
                'rol'    => $nuevoUsuario->getRol()
            ];
            header("Location: ../index.php?msg=Usuario registrado correctamente");
            exit;
        } else {
            $_SESSION['register_error'] = "Error al registrar usuario.";
            header("Location: ../Login/formRegistro.php");
            exit;
        }
    }
}

// LOGOUT
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header("Location: ../index.php?msg=Sesión cerrada correctamente");
    exit;
}

// Si no hay acción válida
header("Location: ../Login/formLogin.php");
exit;
