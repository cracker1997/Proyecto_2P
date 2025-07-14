<!-- autor: Cusme Fienco Axel -->
<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Inventario General</h2>

    <!-- Buscador y botón agregar -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
        <form method="GET" action="index.php" style="display: flex; align-items: center; gap: 10px;">
            <input type="hidden" name="c" value="Inventario">
            <input 
                type="text" 
                name="buscar" 
                placeholder="Buscar por nombre o descripción..." 
                value="<?= $_GET['buscar'] ?? '' ?>"
                style="width: 250px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
                oninput="if(this.value === '') this.form.submit();"
            >
            <button type="submit" style="padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 5px;">
                Buscar
            </button>
        </form>

        <a href="index.php?c=Inventario&a=nuevo" class="btn-agregar">+ Agregar Ítem</a>
    </div>

    <!-- Resultado de búsqueda -->
    <?php if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) : ?>
        <p><strong>Mostrando resultados para:</strong> <?= htmlspecialchars($_GET['buscar']) ?></p>
    <?php endif; ?>

    <!-- Tabla -->
    <div style="overflow-x: auto;">
        <table class="tabla" border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #f0f0f0;">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Fecha Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($lista)) : ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No se encontraron registros.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($lista as $item): ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= htmlspecialchars($item['nombre']) ?></td>
                            <td><?= htmlspecialchars($item['descripcion']) ?></td>
                            <td><?= $item['cantidad'] ?></td>
                            <td><?= $item['estado'] ?></td>
                            <td><?= $item['fecha_registro'] ?></td>
                            <td>
                                <a href="index.php?c=Inventario&a=editar&id=<?= $item['id'] ?>" class="btn-editar">Editar</a>
                                <a href="index.php?c=Inventario&a=eliminar&id=<?= $item['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar este ítem?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <?php if ($totalPaginas > 1): ?>
            <nav style="margin-top: 20px; text-align: center;">
                <!-- Primera -->
                <a href="index.php?c=Inventario&pagina=1<?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
                style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px;">&laquo;</a>

                <!-- Anterior -->
                <a href="index.php?c=Inventario&pagina=<?= max($pagina - 1, 1) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
                style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px;">&lt;</a>

                <?php
                $maxPag = 5;
                $inicio = max(1, $pagina - floor($maxPag / 2));
                $fin = min($inicio + $maxPag - 1, $totalPaginas);
                if ($fin - $inicio < $maxPag - 1) {
                    $inicio = max(1, $fin - $maxPag + 1);
                }
                for ($i = $inicio; $i <= $fin; $i++): ?>
                    <a href="index.php?c=Inventario&pagina=<?= $i ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
                    style="margin: 0 5px; padding: 6px 12px; background-color: <?= $i == $pagina ? '#007bff' : '#eee' ?>; color: <?= $i == $pagina ? '#fff' : '#000' ?>; border-radius: 5px; text-decoration: none;">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <!-- Siguiente -->
                <a href="index.php?c=Inventario&pagina=<?= min($pagina + 1, $totalPaginas) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
                style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px;">&gt;</a>

                <!-- Última -->
                <a href="index.php?c=Inventario&pagina=<?= $totalPaginas ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
                style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px;">&raquo;</a>
            </nav>
        <?php endif; ?>
    </div>
</main>
<?php require_once "view/templates/footer.php"; ?>
