<!-- autor: Ordoñez Arreaga Ronny -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <?php if (isset($error)) : ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
        <form action="index.php?c=Login&a=validar" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>

            <label for="clave">Clave:</label>
            <input type="password" name="clave" id="clave" required>

            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>
