<!-- autor: Cabanilla Piza David-->
 <?php
session_start();
require_once "model/dao/ActivityDAO.php";
require_once "model/dto/ActivityDTO.php";

class ActivityController {
    public function session_check() {
        if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?c=Login");
        exit();
    }
}
    public function index() {
        $this-> session_check();
        $rol = $_SESSION['usuario']['rol'];
        if (isset($_GET['fecha']) && !empty(trim($_GET['fecha']))) {
            $fecha = trim($_GET['fecha']);
            $activities_list=ActivityDAO::listar($fecha);
    } else {
        $activities_list=ActivityDAO::listar(date('Y-m-d'));
    }

    
    require_once "view/activity/activity.index.php";
}

    public function delete($id_activity){
        $this->session_check();
        $id_activity = $_GET['id'] ?? null;
        if (!$id_activity || !is_numeric($id_activity)) {
            echo "<script>alert('ID inválido.'); window.location.href='index.php?c=Activies';</script>";
            return;
        }

        NinoDAO::eliminar($id_activity);
        header("Location: index.php?c=Activities");
    }

    public function edit() {
        $this-> session_check();
        $id_activity = $_GET['id'] ?? null;
        $activities_details=ActivityDAO::searchById($id_activity);
    
    require_once "view/activity/activity.edit.php";
}

}