<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Editar Niño</h2>
    <form action="index.php?c=Ninos&a=actualizar" method="POST" class="form-grid">
        <input type="hidden" name="id" value="<?= $dato['id'] ?>">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= $dato['nombre'] ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?= $dato['apellido'] ?>" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?= $dato['fecha_nacimiento'] ?>" required>
        </div>

        <div class="form-group">
            <label for="genero">Género:</label>
            <select name="genero" id="genero" required>
                <option value="">Seleccione</option>
                <option value="Masculino" <?= $dato['genero'] === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                <option value="Femenino" <?= $dato['genero'] === 'Femenino' ? 'selected' : '' ?>>Femenino</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nivel">Nivel educativo:</label>
            <input type="text" name="nivel" id="nivel" value="<?= $dato['nivel'] ?>" required>
        </div>

        <div class="form-group">
            <label for="tutor">Nombre del tutor:</label>
            <input type="text" name="tutor" id="tutor" value="<?= $dato['tutor'] ?>" required>
        </div>

        <!-- Alergias -->
        <div class="form-group">
            <label>
                <input type="checkbox" name="alergias" id="check-alergias" value="1" <?= $dato['alergias'] ? 'checked' : '' ?>>
                ¿Tiene alergias?
            </label>
        </div>

        <div class="form-group">
            <label for="detalle_alergias">Detalle de alergias:</label>
            <input type="text" name="detalle_alergias" id="detalle_alergias"
                placeholder="Ej. Polen, gluten..." value="<?= htmlspecialchars($dato['detalle_alergias']) ?>"
                <?= $dato['alergias'] ? '' : 'disabled' ?>>
        </div>

        <!-- Botones -->
        <div class="form-acciones">
            <button type="submit" class="btn-agregar">Guardar</button>
            <a href="index.php?c=Ninos" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</main>
<?php require_once "view/templates/footer.php"; ?>
<script src="assets/js/ninos.js"></script>
