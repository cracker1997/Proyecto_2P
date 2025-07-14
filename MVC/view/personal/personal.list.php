<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Listado de Personal Registrado</h2>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
        <form method="GET" action="index.php" style="display: flex; align-items: center; gap: 10px;">
            <input type="hidden" name="c" value="Personal">
            <input 
                type="text" 
                name="buscar" 
                id="input-busqueda" 
                placeholder="Buscar por nombre o apellido..." 
                value="<?= $_GET['buscar'] ?? '' ?>"
                style="width: 250px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
                oninput="if(this.value === '') this.form.submit();"
            >
            <button type="submit" style="padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 5px;">
                Buscar
            </button>
        </form>

        <a href="index.php?c=Personal&a=nuevo" class="btn-agregar">+ Agregar Personal</a>
    </div>

    <?php if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) : ?>
        <p style="margin-bottom: 15px;">
            Resultados de la búsqueda: <strong><?= htmlspecialchars($_GET['buscar']) ?></strong> 
            (<a href="index.php?c=Personal&a=index" style="color: #007bff; text-decoration: underline;">Limpiar búsqueda</a>)
        </p>
    <?php endif; ?>

    <div class="tabla-contenedor">
        <table class="tabla">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Completo</th>
                    <th>Cargo</th>
                    <th>Fecha Nacimiento</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($datos)): ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No se encontraron registros de personal.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($datos as $personal): ?>
                        <tr>
                            <td><?= htmlspecialchars($personal['id']) ?></td>
                            <td><?= htmlspecialchars($personal['nombre'] . ' ' . $personal['apellido']) ?></td>
                            <td><?= htmlspecialchars($personal['cargo']) ?></td>
                            <td><?= htmlspecialchars($personal['fecha_nacimiento']) ?></td>
                            <td><?= htmlspecialchars($personal['telefono']) ?></td>
                            <td><?= htmlspecialchars($personal['email']) ?></td>
                            <td class="acciones">
                                <a href="index.php?c=Personal&a=editar&id=<?= htmlspecialchars($personal['id']) ?>" class="btn-editar">Editar</a>
                                <a href="index.php?c=Personal&a=eliminar&id=<?= htmlspecialchars($personal['id']) ?>" 
                                   class="btn-eliminar" 
                                   onclick="return confirm('¿Está seguro de que desea eliminar este registro?');">
                                   Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="paginacion" style="margin-top: 20px; display: flex; justify-content: center; align-items: center;">
        <?php
        $pagina = $pagina ?? 1;
        $totalPaginas = $totalPaginas ?? 1;
        $maxPag = 5;
        $inicio = max(1, $pagina - floor($maxPag / 2));
        $fin = min($inicio + $maxPag - 1, $totalPaginas);
        if ($fin - $inicio < $maxPag - 1) {
            $inicio = max(1, $fin - $maxPag + 1);
        }
        ?>

        <a href="index.php?c=Personal&pagina=1<?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
           style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&laquo;</a>

        <a href="index.php?c=Personal&pagina=<?= max($pagina - 1, 1) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
           style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&lt;</a>

        <?php for ($i = $inicio; $i <= $fin; $i++): ?>
            <a href="index.php?c=Personal&pagina=<?= $i ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
               style="margin: 0 5px; padding: 6px 12px; background-color: <?= $i == $pagina ? '#007bff' : '#eee' ?>; color: <?= $i == $pagina ? '#fff' : '#000' ?>; border-radius: 5px; text-decoration: none;">
               <?= $i ?>
            </a>
        <?php endfor; ?>

        <a href="index.php?c=Personal&pagina=<?= min($pagina + 1, $totalPaginas) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
           style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&gt;</a>

        <a href="index.php?c=Personal&pagina=<?= $totalPaginas ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
           style="margin: 0 5px; padding: 6px 12px; background-color: #eee; border-radius: 5px; text-decoration: none;">&raquo;</a>
    </div>

</main>
<?php require_once "view/templates/footer.php"; ?>