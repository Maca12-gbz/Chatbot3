<?php
// login.php

// 1. Inicia la sesión al comienzo del archivo
session_start();

$error_message = '';
$email_value = ''; 

// 2. Verifica si el usuario ya está logueado
// Redirige a la ubicación correcta para evitar que vea el formulario de login.
if (isset($_SESSION['usuario_id'])) {
    header('Location: ../PHP/index.php'); // RUTA CORREGIDA
    exit;
}

// 3. Procesa el formulario si se ha enviado (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $email_value = $email; 

    // LÓGICA CORREGIDA: Se valida que los campos no estén vacíos.
    if (!empty($email) && !empty($password)) {
        // Consulta para verificar las credenciales y obtener el rol
        include('conexion.php'); // Conexión a la base de datos
        $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email); // Usamos el email como nombre de usuario
        $stmt->execute();
        $result = $stmt->get_result();
        $usuario_data = $result->fetch_assoc();

        // Verificamos si las credenciales son correctas
        if ($usuario_data && password_verify($password, $usuario_data['contraseña'])) {
            // Iniciar sesión
            $_SESSION['usuario_id'] = $usuario_data['usuario_id'];
            $_SESSION['usuario_nombre'] = $usuario_data['nombre_usuario'];
            $_SESSION['rol'] = $usuario_data['rol']; // Guardamos el rol del usuario

            // Redirigir según el rol del usuario
            switch ($_SESSION['rol']) {
                case 'Administrador':
                    header('Location: ../PHP/admin_dashboard.php'); // Redirige al dashboard del Administrador
                    break;
                case 'Moderador':
                    header('Location: ../PHP/moderator_dashboard.php'); // Redirige al dashboard del Moderador
                    break;
                case 'Analista':
                    header('Location: ../PHP/analyst_dashboard.php'); // Redirige al dashboard del Analista
                    break;
                case 'Usuario Común':
                    header('Location: ../PHP/user_dashboard.php'); // Redirige al dashboard del Usuario Común
                    break;
                default:
                    $error_message = 'Rol no válido.';
            }
            exit;
        } else {
            // Si las credenciales son incorrectas
            $error_message = 'Email o contraseña incorrectos.';
        }
    } else {
        // Si uno de los campos está vacío
        $error_message = 'Por favor, ingresa tu email y contraseña.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Chatbot - Iniciar Sesión</title>
    <style>
        /* Estilos básicos para el formulario */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; 
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c; 
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #4cae4c;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Vista Chatbot - Ingreso</h2>

    <?php
    // Muestra el mensaje de error si el login falla
    if ($error_message) {
        echo '<p class="error-message">' . htmlspecialchars($error_message) . '</p>';
    }
    ?>

    <form action="login.php" method="POST"> 
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="tu.email@ejemplo.com" 
                   value="<?php echo htmlspecialchars($email_value); ?>">
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required placeholder="********">
        </div>

        <button type="submit">Ingresar</button>
    </form>
</div>

</body>
</html>