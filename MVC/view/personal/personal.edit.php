<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Editar Personal</h2>
    <form action="index.php?c=Personal&a=actualizar" method="POST" class="form-grid">
        <input type="hidden" name="id" value="<?= $dato['id'] ?>">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= htmlspecialchars($dato['nombre']) ?>" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" value="<?= htmlspecialchars($dato['apellido']) ?>" required>
        </div>

        <div class="form-group">
            <label for="cargo">Cargo:</label>
            <input type="text" name="cargo" id="cargo" value="<?= htmlspecialchars($dato['cargo']) ?>" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?= htmlspecialchars($dato['fecha_nacimiento']) ?>" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" value="<?= htmlspecialchars($dato['direccion']) ?>" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="tel" name="telefono" id="telefono" value="<?= htmlspecialchars($dato['telefono']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($dato['email']) ?>" required>
        </div>

        <div class="form-acciones">
            <button type="submit" class="btn-agregar">Guardar Cambios</button>
            <a href="index.php?c=Personal" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</main>
<?php require_once "view/templates/footer.php"; ?>