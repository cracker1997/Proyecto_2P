<!-- autor: Ordoñez Arreaga Ronny -->
<?php
if (!isset($_SESSION)) session_start();
$rol = $_SESSION['usuario']['rol'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Guardería Infantil</title>
    <link rel="stylesheet" href="assets/css/home.css">
</head>
<body>

<nav class="barra-navegacion">
    <div class="logo">
        <img src="assets/img/logo_guarderia.png" alt="Logo Guardería">
    </div>
    <ul class="nav-enlaces">
        <li><a href="index.php?c=Home">Inicio</a></li>

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
