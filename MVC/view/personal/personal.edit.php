<!-- autor: Carrasco Claudio -->
<h2>Editar Personal</h2>
<form action="" method="POST">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= $registro['nombre'] ?>" required><br>

    <label>Apellido:</label>
    <input type="text" name="apellido" value="<?= $registro['apellido'] ?>" required><br>

    <label>Cédula:</label>
    <input type="text" name="cedula" value="<?= $registro['cedula'] ?>" required><br>

    <label>Cargo:</label>
    <input type="text" name="cargo" value="<?= $registro['cargo'] ?>" required><br>

    <label>Correo:</label>
    <input type="email" name="correo" value="<?= $registro['correo'] ?>"><br>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?= $registro['telefono'] ?>"><br>

    <button type="submit">Actualizar</button>
</form>
<a href="index.php?c=personal">Volver</a>
