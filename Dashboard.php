<?php
// dashboard.php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

echo "Bienvenido, " . $_SESSION['user'] . ". Rol: " . $_SESSION['role'];
?>
