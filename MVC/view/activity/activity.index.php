<!-- autor: Cabanilla Piza David-->
<?php require_once "view/templates/navbar.php"; ?>
<link rel="stylesheet" href="view/activity/Activity.css">

<div class="main-activity-container">
    <h1 class="activity-title">Lista de actividades</h1>
    <div>
        <form method="GET" action="index.php?" class="activity-form" style="margin-bottom: 0;">
            <input type="hidden" name="c" value="Activity">
            <input type="hidden" name="a" value="index">
            <input type="date" name="fecha" value="<?= $_GET['fecha'] ?? date('Y-m-d') ?>">
            <button type="submit">Buscar</button>
            <?php if ($rol === 'Administrador'): ?>
                <a href="index.php?c=Activity&a=new" class="activity-actions">Nueva Actividad</a>
            <?php endif; ?>
        </form>
    </div>

    <div class="activity-list">
        <?php for($i=0;$i<count($activities_list);$i++): ?>
            <div class="activity-card">
                <h2><?= $activities_list[$i]["razon"] ?></h2>
                <div class="activity-info">
                    <?= "Lugar: ".$activities_list[$i]["lugar"]." | Hora: ".$activities_list[$i]["hora"]." | Fecha: ".$activities_list[$i]["fecha"] ?>
                </div>
                <?php if($rol==="Administrador"):?>
                <div class="activity-actions">
                    <a href="index.php?c=Activity&a=delete&id=<?= $activities_list[$i]['id'] ?>">Eliminar</a>
                    <a href="index.php?c=Activity&a=edit&id=<?= $activities_list[$i]['id'] ?>">Editar</a>
                </div>
                <?php endif; ?>
            </div>
        <?php endfor; ?>
    </div>
</div>