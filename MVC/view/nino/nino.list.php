<?php require_once "view/templates/navbar.php"; ?>
<head>
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<main class="container">
    <h2>Listado de Niños</h2>
    <a href="index.php?c=Ninos&a=nuevo" class="btn-agregar">+ Agregar Niño</a>
    <table class="tabla">
        <thead>
    <tr>
        <th>ID</th>
        <th>Nombre completo</th>
        <th>Fecha nacimiento</th>
        <th>Género</th>
        <th>Nivel</th>
        <th>Tutor</th>
        <th>Alergias</th>
        <th>Detalle</th>
        <th>Acciones</th>
    </tr>
</thead>
        <tbody>
<?php foreach ($lista as $nino): ?>
    <tr>
        <td><?= $nino['id'] ?></td>
        <td><?= $nino['nombre'] . ' ' . $nino['apellido'] ?></td>
        <td><?= $nino['fecha_nacimiento'] ?></td>
        <td><?= $nino['genero'] ?></td>
        <td><?= $nino['nivel'] ?></td>
        <td><?= $nino['tutor'] ?></td>
        <td><?= $nino['alergias'] ? 'Sí' : 'No' ?></td>
        <td><?= $nino['detalle_alergias'] ?? '-' ?></td>
        <td>
            <a href="index.php?c=Ninos&a=editar&id=<?= $nino['id'] ?>" class="btn-editar">Editar</a>
            <a href="index.php?c=Ninos&a=eliminar&id=<?= $nino['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
        </td>
    </tr>
<?php endforeach; ?>
</tbody>
    </table>
</main>
<?php require_once "view/templates/footer.php"; ?>
