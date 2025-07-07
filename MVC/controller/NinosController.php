<?php
//autor: Ronny Ordoñez
session_start();
require_once "model/dao/NinoDAO.php";
require_once "model/dto/NinoDTO.php";

class NinosController {

    public function index() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }

        $lista = NinoDAO::listar();
        require_once "view/nino/nino.list.php";
    }

    public function nuevo() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }

        require_once "view/nino/nino.new.php";
    }

    public function guardar() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }

        $nino = new NinoDTO();
        $nino->setNombre($_POST['nombre']);
        $nino->setApellido($_POST['apellido']);
        $nino->setFechaNacimiento($_POST['fecha_nacimiento']);
        $nino->setGenero($_POST['genero']);
        $nino->setNivel($_POST['nivel']);
        $nino->setTutor($_POST['tutor']);
        $nino->setAlergias(isset($_POST['alergias']) ? 1 : 0);
        $nino->setDetalleAlergias($_POST['detalle_alergias'] ?? null);
        $nino->setUsuarioCreacion($_SESSION['usuario']['nombre']);

        NinoDAO::guardar($nino);
        header("Location: index.php?c=Ninos");
    }

    public function editar() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }

        $id = $_GET['id'];
        $dato = NinoDAO::buscarPorId($id);
        require_once "view/nino/nino.edit.php";
    }

    public function actualizar() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }

        $nino = new NinoDTO();
        $nino->setId($_POST['id']);
        $nino->setNombre($_POST['nombre']);
        $nino->setApellido($_POST['apellido']);
        $nino->setFechaNacimiento($_POST['fecha_nacimiento']);
        $nino->setGenero($_POST['genero']);
        $nino->setNivel($_POST['nivel']);
        $nino->setTutor($_POST['tutor']);
        $nino->setAlergias(isset($_POST['alergias']) ? 1 : 0);
        $nino->setDetalleAlergias($_POST['detalle_alergias'] ?? null);
        $nino->setUsuarioActualizacion($_SESSION['usuario']['nombre']);

        NinoDAO::actualizar($nino);
        header("Location: index.php?c=Ninos");
    }

    public function eliminar() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }

        $id = $_GET['id'];
        NinoDAO::eliminar($id);
        header("Location: index.php?c=Ninos");
    }
}
