<?php require_once "view/templates/navbar.php"; ?>
<link rel="stylesheet" href="view/activity/Activity.css">

<div class="main-activity-container">
    <h1 class="activity-title">Editar Actividad</h1>
    <form method="post" action="index.php?c=Activity&a=update" class="activity-form">
        <input type="hidden" name="id" value="<?php echo $activities_details[0]['id']; ?>">
        <input type="text" name="razon" value="<?php echo $activities_details[0]['razon']; ?>" placeholder="Razón" required>
        <input type="text" name="descripcion" value="<?php echo $activities_details[0]['descripcion']; ?>" placeholder="Descripción" required>
        <input type="date" name="fecha" value="<?php echo $activities_details[0]['fecha']; ?>" required>
        <input type="time" name="hora" value="<?php echo $activities_details[0]['hora']; ?>"required>
        <input type="text" name="lugar" value="<?php echo $activities_details[0]['lugar']; ?>" placeholder="Lugar"required>
        <button type="submit">Actualizar</button>
    </form>
</div>