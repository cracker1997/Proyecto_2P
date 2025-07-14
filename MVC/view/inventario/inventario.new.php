<!-- autor: Cusme Fienco Axel -->
<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Registrar nuevo ítem de inventario</h2>

    <form action="index.php?c=Inventario&a=guardar" method="POST" class="form-grid">
        <div class="form-group">
            <label for="nombre">Nombre del ítem:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3" required></textarea>
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" required>
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <select name="estado" id="estado" required>
                <option value="Disponible">Disponible</option>
                <option value="No Disponible">No Disponible</option>
            </select>
        </div>

        <div class="form-acciones">
            <button type="submit" class="btn-agregar">Guardar</button>
            <a href="index.php?c=Inventario" class="btn-cancelar">Cancelar</a>
        </div>
    </form>
</main>
<?php require_once "view/templates/footer.php"; ?>
