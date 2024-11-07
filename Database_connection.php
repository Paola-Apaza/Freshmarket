<?php
// database_connection.php
$host = 'localhost';
$db = 'freshmarket_db';
$user = 'root';
$pass = ''; // Cambiar según la configuración de tu base de datos

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
