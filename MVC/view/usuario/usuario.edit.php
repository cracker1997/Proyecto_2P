<!-- autor: Milton Leonardo Lomas Cepeda -->
<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Editar perfil</h2>
    <form action="index.php?c=Usuario&a=actualizar" method="POST" class="form-grid">
        <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?= $usuario['nombre'] ?>" required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" value="<?= $usuario['usuario'] ?>" required>
        </div>

        <div class="form-group">
            <label for="rol">Usuario:</label>
            <input type="text" name="rol" id="rol" value="<?= $usuario['rol'] ?>" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" id="rol" required>
                <option value="Administrador" selected="<?= $usuario['rol'] == "Administrador" ?>">Administrador</option>
                <option value="Docente" selected="<?= $usuario['rol'] == "Docente" ?>">Docente</option>
                <option value="Inventario" selected="<?= $usuario['rol'] == "Inventario" ?>">Inventario</option>
            </select>
        </div>

        <div class="form-group">
            <label for="clave">Clave:</label>
            <input type="password" name="clave" id="clave" placeholder="Vacio = Sin cambio">
        </div>

        <!-- Botones -->
        <div class="form-acciones">
            <button type="submit" class="btn-agregar">Guardar</button>
        </div>
    </form>
</main>
<?php require_once "view/templates/footer.php"; ?>
