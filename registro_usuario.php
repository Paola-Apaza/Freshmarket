<?php
// registro_usuario.php
include 'database_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $query = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $query->bind_param("ssss", $username, $email, $password, $role);

    if ($query->execute()) {
        echo "Usuario añadido exitosamente.";
    } else {
        echo "Error al añadir el usuario.";
    }
}
?>
