<!-- autor: Milton Leonardo Lomas Cepeda -->
<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Listado de Niños Registrados</h2>

    <!-- Formulario de búsqueda y botón agregar -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
        <form method="GET" action="index.php" style="display: flex; align-items: center; gap: 10px;">
            <input type="hidden" name="c" value="Usuario">
            <input 
                type="text" 
                name="buscar" 
                placeholder="Buscar por nombre..." 
                value="<?= $_GET['buscar'] ?? '' ?>"
                style="width: 250px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
                oninput="if(this.value === '') this.form.submit();"
            >
            <button type="submit" style="padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 5px;">
                Buscar
            </button>
        </form>

        <a href="index.php?c=Usuario&a=nuevo" class="btn-agregar">+ Agregar Usuario</a>
    </div>

    <!-- Mensaje si hay búsqueda activa -->
    <?php if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) : ?>
        <p style="margin-bottom: 15px;"><strong>Mostrando resultados para:</strong> <?= htmlspecialchars($_GET['buscar']) ?></p>
    <?php endif; ?>

    <!-- Tabla de niños -->
    <div style="overflow-x: auto;">
        <table class="tabla" border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #f0f0f0;">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Fecha de Creación</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($lista)) : ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">No se encontraron registros.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($lista as $nino): ?>
                        <tr>
                            <td><?= $nino['id'] ?></td>
                            <td><?= $nino['nombre'] ?></td>
                            <td><?= $nino['usuario'] ?></td>
                            <td><?= $nino['fecha_creacion'] ?></td>
                            <td><?= $nino['rol'] ?></td>
                            <td>
                                <a href="index.php?c=Usuario&a=editar&id=<?= $nino['id'] ?>" class="btn-editar">Editar</a>
                                <a href="index.php?c=Usuario&a=eliminar&id=<?= $nino['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Paginación -->
<?php if ($totalPaginas > 1): ?>
<nav style="margin-top: 20px; text-align: center;">
    <!-- Ir a primera -->
    <a href="index.php?c=Usuario&pagina=1<?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
    style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&laquo;</a>

    <!-- Página anterior -->
    <a href="index.php?c=Usuario&pagina=<?= max($pagina - 1, 1) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
    style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&lt;</a>

    <?php
    $maxPag = 5;
    $inicio = max(1, $pagina - floor($maxPag / 2));
    $fin = min($inicio + $maxPag - 1, $totalPaginas);
    if ($fin - $inicio < $maxPag - 1) {
        $inicio = max(1, $fin - $maxPag + 1);
    }
    for ($i = $inicio; $i <= $fin; $i++): ?>
        <a href="index.php?c=Usuario&pagina=<?= $i ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
        style="margin: 0 5px; padding: 6px 12px; background-color: <?= $i == $pagina ? '#007bff' : '#eee' ?>; color: <?= $i == $pagina ? '#fff' : '#000' ?>; border-radius: 5px; text-decoration: none;">
        <?= $i ?>
        </a>
    <?php endfor; ?>

    <!-- Página siguiente -->
    <a href="index.php?c=Usuario&pagina=<?= min($pagina + 1, $totalPaginas) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
    style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&gt;</a>

    <!-- Última -->
    <a href="index.php?c=Usuario&pagina=<?= $totalPaginas ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
    style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&raquo;</a>
</nav>
<?php endif; ?>
        
    </div>
</main>
<?php require_once "view/templates/footer.php"; ?>

