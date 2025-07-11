<?php require_once "view/templates/navbar.php"; ?>
<main class="container">
    <h1>Lista de actividades</h1>
    <div>
        <form method="GET" action="index.php?">
    <input type="hidden" name="c" value="Activity">
    <input type="hidden" name="a" value="index">
            <input type="date" name="fecha" value="<?= $_GET['fecha'] ?? date('Y-m-d') ?>">
            <button type="submit">Buscar</button>
            <?php if ($rol === 'Administrador'): ?>
                <a href="index.php?c=Activity&a=new">Nueva Actividad</a>
            <?php endif; ?>
            
            <?php  for($i=0;$i<count($activities_list);$i++): ?>
                <h2> <?=$activities_list[$i]["razon"]?></h2>
                <?="Lugar: ".$activities_list[$i]["lugar"]." Hora:  "
                .$activities_list[$i]["hora"]." Fecha: ".$activities_list[$i]["fecha"]?>
                <?php if($rol==="Administrador"):?>
                <a href="index.php?c=Activity&a=delete&id=<?= $activities_list[$i]['id'] ?>">eliminar</a>
                <a href="index.php?c=Activity&a=edit&id=<?= $activities_list[$i]['id'] ?>">editar</a>
                <?php endif; ?>
            <?php endfor; ?>
            
        </form>

    </div>

</main>