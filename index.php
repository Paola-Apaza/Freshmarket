<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Vinculación correcta del CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="container-form login">
        <div class="information">
            <div class="info-childs">
                <img src="https://i.pinimg.com/736x/de/34/a0/de34a07970574a1c52d0f6e90815dec5.jpg" alt="Logo" style="width: 270px; height: 420px; border-radius: 5%">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <form class="form" method="post" action="verificar_usuario.php">
                    <label>
                        <i class='bx bx-user'></i>
                        <input name="username" type="text" placeholder="Usuario" required> 
                    </label>
                    <label>
                        <i class='bx bx-lock-alt'></i>
                        <input name="password" type="password" placeholder="Contraseña" required>
                    </label>
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
