<?php require_once "view/templates/navbar.php"; ?>
<?php var_dump($activities_details[0])?>

<main name="container">
<form method="post" action="index.php?c=Activity&a=update">
    <input type="hidden" name="id" value="<?php echo $activities_details[0]['id']; ?>">
    <input type="text" name="razon" value="<?php echo $activities_details[0]['razon']; ?>">
    <input type="text" name="descripcion" value="<?php echo $activities_details[0]['descripcion']; ?>">
    <input type="date" name="fecha" value="<?php echo $activities_details[0]['fecha']; ?>">
    <input type="time" name="hora" value="<?php echo $activities_details[0]['hora']; ?>">
    <input type="text" name="lugar" value="<?php echo $activities_details[0]['lugar']; ?>">
    <button type="submit">Actualizar</button>
</form>
</main>