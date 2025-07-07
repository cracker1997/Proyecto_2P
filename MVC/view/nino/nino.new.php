<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h2>Registrar Nuevo Niño</h2>
    <form action="index.php?c=Ninos&a=guardar" method="POST" class="form-grid">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" id="apellido" required>
        </div>

        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        </div>

        <div class="form-group">
            <label for="genero">Género:</label>
            <select name="genero" id="genero" required>
                <option value="">Seleccione</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nivel">Nivel Educativo:</label>
            <input type="text" name="nivel" id="nivel" placeholder="Ej. Inicial 1" required>
        </div>

        <div class="form-group">
            <label for="tutor">Nombre del Tutor:</label>
            <input type="text" name="tutor" id="tutor" required>
        </div>

        <div class="form-group">
            <label>
            <input type="checkbox" name="alergias" id="check-alergias" value="1">
            ¿Tiene alergias?
            </label>
        </div>

<div class="form-group">
    <label for="detalle_alergias">Detalle de alergias:</label>
    <input type="text" name="detalle_alergias" id="detalle_alergias" placeholder="Ej. Polvo, gluten, lactosa..." disabled>
</div>

        <div class="form-acciones">
            <button type="submit" class="btn-agregar">Guardar</button>
            <a href="index.php?c=Ninos" class="btn-cancelar">Cancelar</a>
        </div>
        

    </form>
    

</main>

<script src="assets/js/ninos.js"></script>
<?php require_once "view/templates/footer.php"; ?>
