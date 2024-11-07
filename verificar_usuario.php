<?php
// verificar_usuario.php
session_start();
include 'database_connection.php';

// Verificación de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa.<br>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Mostrar los valores recibidos
    echo "Valor de username recibido: " . htmlspecialchars($username) . "<br>";
    echo "Valor de password recibido: " . htmlspecialchars($password) . "<br>";

    // Consulta preparada para verificar el usuario
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();
    $user = $result->fetch_assoc();

    if ($user) {
        // Depuración: Mostrar los datos del usuario recuperado
        echo "Usuario encontrado: <pre>";
        print_r($user);
        echo "</pre>";

        // Verificar si la cuenta está bloqueada
        if ($user['is_locked']) {
            echo "La cuenta está bloqueada debido a múltiples intentos fallidos.";
        } else {
            // Verificar la contraseña encriptada
            if (password_verify($password, $user['password'])) {
                echo "Contraseña correcta. Acceso permitido.<br>";
                
                // Guardar en sesión y redirigir al dashboard
                $_SESSION['user'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Reiniciar los intentos fallidos en caso de éxito
                $conn->query("UPDATE users SET failed_attempts = 0 WHERE username = '$username'");
                header("Location: dashboard.php");
                exit;
            } else {
                // Incrementar los intentos fallidos y bloquear si es necesario
                $failed_attempts = $user['failed_attempts'] + 1;
                $is_locked = ($failed_attempts >= 3) ? 1 : 0;
                $conn->query("UPDATE users SET failed_attempts = $failed_attempts, is_locked = $is_locked WHERE username = '$username'");
                echo "Credenciales incorrectas.";
            }
        }
    } else {
        echo "Usuario no encontrado.";
    }
}

?>







