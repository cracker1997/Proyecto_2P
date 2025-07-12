<!-- autor: Carrasco Claudio -->
<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Listado del Personal Registrado</h2>

    <!-- Formulario de búsqueda y botón agregar -->
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

        <a href="index.php?c=Personal&a=crear" class="btn-agregar">+ Agregar Personal</a>
    </div>

    <?php if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) : ?>
        <p style="margin-bottom: 15px;"><strong>Mostrando resultados para:</strong> <?= htmlspecialchars($_GET['buscar']) ?></p>
    <?php endif; ?>

    <div style="overflow-x: auto;">
        <table class="tabla" border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse;">
            <thead style="background-color: #f0f0f0;">
                <tr>
                    <th>ID</th>
                    <th>Nombre completo</th>
                    <th>Cédula</th>
                    <th>Cargo</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-personal">
                <?php if (empty($lista)) : ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No se encontraron registros.</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($lista as $persona): ?>
                        <tr>
                            <td><?= $persona['id'] ?></td>
                            <td><?= htmlspecialchars($persona['nombre'] . ' ' . $persona['apellido']) ?></td>
                            <td><?= htmlspecialchars($persona['cedula']) ?></td>
                            <td><?= htmlspecialchars($persona['cargo']) ?></td>
                            <td><?= htmlspecialchars($persona['correo']) ?></td>
                            <td><?= htmlspecialchars($persona['telefono']) ?></td>
                            <td>
                                <a href="index.php?c=Personal&a=editar&id=<?= $persona['id'] ?>" class="btn-editar">Editar</a>
                                <a href="index.php?c=Personal&a=eliminar&id=<?= $persona['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar este registro?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- Paginación -->
        <?php if ($totalPaginas > 1): ?>
        <nav style="margin-top: 20px; text-align: center;">
            <a href="index.php?c=Personal&pagina=1<?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>" style="margin: 0 5px;">&laquo;</a>
            <a href="index.php?c=Personal&pagina=<?= max($pagina - 1, 1) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>" style="margin: 0 5px;">&lt;</a>

            <?php
            $maxPag = 5;
            $inicio = max(1, $pagina - floor($maxPag / 2));
            $fin = min($inicio + $maxPag - 1, $totalPaginas);
            if ($fin - $inicio < $maxPag - 1) {
                $inicio = max(1, $fin - $maxPag + 1);
            }
            for ($i = $inicio; $i <= $fin; $i++): ?>
                <a href="index.php?c=Personal&pagina=<?= $i ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>"
                   style="margin: 0 5px; padding: 6px 12px; background-color: <?= $i == $pagina ? '#007bff' : '#eee' ?>; color: <?= $i == $pagina ? '#fff' : '#000' ?>; border-radius: 5px; text-decoration: none;">
                   <?= $i ?>
                </a>
            <?php endfor; ?>

            <a href="index.php?c=Personal&pagina=<?= min($pagina + 1, $totalPaginas) ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>" style="margin: 0 5px;">&gt;</a>
            <a href="index.php?c=Personal&pagina=<?= $totalPaginas ?><?= isset($_GET['buscar']) ? '&buscar=' . urlencode($_GET['buscar']) : '' ?>" style="margin: 0 5px;">&raquo;</a>
        </nav>
        <?php endif; ?>
    </div>
</main>

<?php require_once "view/templates/footer.php"; ?>
<script src="../../assets/js/buscarPersonal.js"></script>
