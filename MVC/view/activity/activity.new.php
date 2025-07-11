<?php require_once "view/templates/navbar.php"; ?>


<main name="container">
<form method="post" action="index.php?c=Activity&a=save">
    <input type="text" name="razon" >
    <input type="text" name="descripcion" >
    <input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>" >
    <input type="time" name="hora" value="<?php echo date('H:i'); ?>">
    <input type="text" name="lugar" >
    <button type="submit">Agregar</button>
</form>
</main>