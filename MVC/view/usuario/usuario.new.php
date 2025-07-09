<!-- autor: Milton Leonardo Lomas Cepeda -->
<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Crear nuevo usuario</h2>
    <form action="index.php?c=Usuario&a=guardar" method="POST" class="form-grid">
        <input type="hidden" name="c" value="guardar">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" id="rol" required>
                <option value="">Seleccione</option>
                <option value="Administrador">Administrador</option>
                <option value="Docente">Docente</option>
                <option value="Inventario">Inventario</option>
            </select>
        </div>

        <div class="form-group">
            <label for="clave">Clave:</label>
            <input type="password" name="clave" id="clave" placeholder="Contraseña" required>
        </div>

        <div class="form-acciones">
            <button type="submit" class="btn-agregar">Guardar</button>
            <a href="index.php?c=Usuario" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</main>
<?php require_once "view/templates/footer.php"; ?>
