<!-- autor: Ronny Ordoñez -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Guardería</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="barra-navegacion">
    <div class="logo">
        <img src="assets/img/logo_guarderia.png" alt="Logo Guardería">
    </div>
    <ul class="nav-enlaces">
        <?php if ($rol === 'Administrador') : ?>
            <li><a href="index.php?c=Ninos&a=index">Niños</a></li>
            <li><a href="index.php?c=Personal&a=index">Personal</a></li>
            <li><a href="index.php?c=Usuario&a=index">Usuarios</a></li>
            <li><a href="index.php?c=Inventario&a=index">Inventario</a></li>
            <li><a href="index.php?c=Actividades&a=index">Actividades</a></li>
        <?php elseif ($rol === 'Docente') : ?>
            <li><a href="index.php?c=Ninos&a=index">Niños</a></li>
            <li><a href="index.php?c=Actividades&a=index">Actividades</a></li>
        <?php elseif ($rol === 'Inventario') : ?>
            <li><a href="index.php?c=Inventario&a=index">Inventario</a></li>
        <?php endif; ?>
    </ul>
    <div class="cerrar-sesion">
        <a href="index.php?c=Login&a=logout">Cerrar sesión</a>
    </div>
</nav>


    <!-- Contenido principal -->
    <main id="main" class="container">
        <h1>Bienvenido, <?= $_SESSION['usuario']['nombre'] ?> 👋</h1>
        <p>Rol: <strong><?= $rol ?></strong></p>
        <p>Esta es la plataforma de gestión para guarderías. Usa el menú superior para navegar entre los módulos disponibles.</p>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-contenido">
            <p>&copy; 2025 Guardería Infantil. Todos los derechos reservados.</p>
            <p><a href="#">Términos y condiciones</a> | <a href="#">Política de privacidad</a></p>
            <div class="redes-sociales">
                <a href="https://facebook.com/"><img src="assets/img/facebook.png.webp" alt="Facebook"></a>
                <a href="https://www.instagram.com/"><img src="assets/img/instagran.png" alt="Instagram"></a>
                <a href="https://x.com/"><img src="assets/img/x.png" alt="Twitter"></a>
            </div>
        </div>
    </footer>
</body>
</html>
