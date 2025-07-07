<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Listado de Niños Registrados</h2>

    <!-- Formulario de búsqueda y botón agregar -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
        <form method="GET" action="index.php" style="display: flex; align-items: center; gap: 10px;">
            <input type="hidden" name="c" value="Ninos">
            <input 
                type="text" 
                name="buscar" 
                placeholder="Buscar por nombre o apellido..." 
                value="<?= $_GET['buscar'] ?? '' ?>"
                style="width: 250px; padding: 8px; border: 1px solid #ccc; border-radius: 5px;"
                oninput="if(this.value === '') this.form.submit();"
            >
            <button type="submit" style="padding: 8px 16px; background-color: #007bff; color: white; border: none; border-radius: 5px;">
                Buscar
            </button>
        </form>

        <a href="index.php?c=Ninos&a=nuevo" class="btn-agregar">+ Agregar Niño</a>
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
                <?php if (empty($lista)) : ?>
                    <tr>
                        <td colspan="9" style="text-align: center;">No se encontraron registros.</td>
                    </tr>
                <?php else : ?>
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
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<?php require_once "view/templates/footer.php"; ?>

