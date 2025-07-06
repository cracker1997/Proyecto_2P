<!-- autor: Ronny Ordoñez -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Guardería</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>
    <header>
        <h1>Bienvenido a la Plataforma de la Guardería</h1>
        <nav>
            <ul>
                <?php if ($rol === 'Administrador' || $rol === 'Docente') : ?>
                    <li><a href="index.php?c=Ninos&a=index">Niños</a></li>
                    <li><a href="index.php?c=Actividades&a=index">Actividades</a></li>
                <?php endif; ?>

                <?php if ($rol === 'Administrador') : ?>
                    <li><a href="index.php?c=Personal&a=index">Personal</a></li>
                    <li><a href="index.php?c=Usuario&a=index">Usuarios</a></li>
                    <li><a href="index.php?c=Inventario&a=index">Inventario</a></li>
                <?php endif; ?>

                <li><a href="index.php?c=Login&a=logout">Cerrar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <p class="bienvenida">Hola <strong><?= $_SESSION['usuario']['nombre'] ?></strong>, estás logueado como <em><?= $rol ?></em>.</p>
        <section>
            <h2>Resumen</h2>
            <p>Selecciona un módulo del menú para comenzar.</p>
        </section>
    </main>
</body>
</html>
