<?php
include 'database_connection.php';

// Datos del nuevo usuario
$username = 'supervisor1@freshmarket.com';  // Cambiar por el nombre de usuario
$email = 'supervisor1@freshmarket.com';     // Cambiar por el email
$password = 'nkn';  // La contraseña que deseas para el usuario
$role = 'supervisor';  // El rol del usuario

// Encriptar la contraseña antes de insertarla
$password_hashed = password_hash($password, PASSWORD_BCRYPT);

// Preparar la consulta para insertar el usuario
$query = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $username, $email, $password_hashed, $role);

// Ejecutar la consulta
if ($query->execute()) {
    echo "Usuario insertado exitosamente.";
} else {
    echo "Error al insertar usuario: " . $conn->error;
}

$stored_hashed_password = '$2y$10$D9dP0K1t8wNe.pfg03FUGft7pEXy8OPF01uS2iYfrFDKHLyy6OszO'; // Ejemplo de una contraseña almacenada en la base de datos
$input_password = 'nkn';  // Contraseña ingresada

if (password_verify($input_password, $stored_hashed_password)) {
    echo "Contraseña correcta!";
} else {
    echo "Contraseña incorrecta!";
}


?>
