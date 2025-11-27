<?php
// Incluir la conexión a la base de datos
include('conexion.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $usuario = $_POST['usuario'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Cifrar la contraseña
    $rol = $_POST['rol'];

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre_usuario, contraseña, rol) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $usuario, $contraseña, $rol); // Asignar parámetros
    $stmt->execute();

    // Confirmar que el registro fue exitoso y redirigir o mostrar mensaje
    echo "Usuario registrado con éxito";
    header("Location: login.php"); // Redirigir a la página de inicio de sesión
}
?>

<!-- Formulario HTML para registrar usuarios -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registrar un nuevo usuario</h2>
    <form action="registro.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required><br>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br>

        <label for="rol">Rol:</label>
        <select name="rol">
            <option value="Administrador">Administrador</option>
            <option value="Moderador">Moderador</option>
            <option value="Analista">Analista</option>
            <option value="Usuario Común">Usuario Común</option>
        </select><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>