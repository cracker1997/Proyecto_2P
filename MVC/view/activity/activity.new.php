<!-- autor: Cabanilla Piza David-->
<?php require_once "view/templates/navbar.php"; ?>
<link rel="stylesheet" href="view/activity/Activity.css">

<div class="main-activity-container">
    <h1 class="activity-title">Nueva Actividad</h1>
    <form method="post" action="index.php?c=Activity&a=save" class="activity-form">
        <input type="text" name="razon" placeholder="Razón" required>
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>" required>
        <input type="time" name="hora" value="<?php echo date('H:i'); ?>" required>
        <input type="text" name="lugar" placeholder="Lugar" required>
        <button type="submit">Agregar</button>
    </form>
</div>