<?php
//autor: Cabanilla Piza David
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

    public function delete(){
        $this->session_check();
        $id_activity = $_GET['id'] ?? null;
        if (!$id_activity || !is_numeric($id_activity) || empty($id_activity)) {
            echo "<script>alert('ID inválido.'); window.location.href='index.php?c=Activity&a=index';</script>";
            return;
        }
        ActivityDAO::delete($id_activity);
        header("Location: index.php?c=Activity&a=index");
    }

    public function edit() {
        $this-> session_check();
        $id_activity = $_GET['id'] ?? null;
        $activities_details=ActivityDAO::searchById($id_activity);
    
    require_once "view/activity/activity.edit.php";
}
    public function update(){
        $this-> session_check();
        $id_activity = $_POST['id'] ?? null;


        $required = [
            'id' => $_POST['id'] ?? '',
            'razon' => $_POST['razon'] ?? '',
            'descripcion' => $_POST['descripcion'] ?? '',
            'fecha' => $_POST['fecha'] ?? '',
            'hora' => $_POST['hora'] ?? '',
            'lugar' => $_POST['lugar'] ?? ''
        ];
        foreach ($required as $key => $value) {
            if (empty(trim($value))) {
                echo "<script>alert('Campo \"$key\" vacío o inválido.'); window.location.href='index.php?c=Activity&a=edit&id={$id_activity}';</script>";
                return;
            }
        }
        if (!$id_activity || !is_numeric($id_activity)) {
            echo "<script>alert('ID inválido.'); window.location.href='index.php?c=Activity&a=index';</script>";
            return;
        }
        $Activitie = new ActivityDTO;
        $Activitie->setId($_POST['id']);
        $Activitie->setRazon($_POST['razon']);
        $Activitie->setDescripcion($_POST['descripcion']);
        $Activitie->setFecha($_POST['fecha']);
        $Activitie->setHora($_POST['hora']);
        $Activitie->setLugar($_POST['lugar']); 
        $Activitie->setUsuarioCreacion($_SESSION['usuario']['nombre']);
        ActivityDAO::update($Activitie);
        header("Location: index.php?c=Activity&a=index");

    }
    public function save() {
        $this-> session_check();
        $required = [
            'razon' => $_POST['razon'] ?? '',
            'descripcion' => $_POST['descripcion'] ?? '',
            'fecha' => $_POST['fecha'] ?? '',
            'hora' => $_POST['hora'] ?? '',
            'lugar' => $_POST['lugar'] ?? ''
        ];
        foreach ($required as $key => $value) {
            if (empty(trim($value))) {
                echo "<script>alert('Campo \"$key\" vacío o inválido.'); window.location.href='index.php?c=Activity&a=new';</script>";
                return;
            }
        }
        $Activitie = new ActivityDTO;
        $Activitie->setRazon($_POST['razon']);
        $Activitie->setDescripcion($_POST['descripcion']);
        $Activitie->setFecha($_POST['fecha']);
        $Activitie->setHora($_POST['hora']);
        $Activitie->setLugar($_POST['lugar']); 
        $Activitie->setUsuarioCreacion($_SESSION['usuario']['nombre']);
        ActivityDAO::guardar($Activitie);
        header("Location: index.php?c=Activity&a=index");
    }

    public function new() {
        $this-> session_check();
        

    require_once "view/activity/activity.new.php";
}

}