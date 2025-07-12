<!-- autor: Carrasco Claudio -->
<?php

require_once "model/dao/PersonalDAO.php";
require_once "model/dto/PersonalDTO.php";

class ControladorPersonal {

    public function index() {
        $inicio = $_GET['inicio'] ?? 0;
        $limite = 10;
        $personal = PersonalDAO::listarPaginado($inicio, $limite);
        $total = PersonalDAO::totalRegistros();
        require "view/personal/index.php";
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dto = new PersonalDTO();
            $dto->setNombre($_POST['nombre']);
            $dto->setApellido($_POST['apellido']);
            $dto->setCedula($_POST['cedula']);
            $dto->setCargo($_POST['cargo']);
            $dto->setCorreo($_POST['correo']);
            $dto->setTelefono($_POST['telefono']);
            $dto->setUsuarioCreacion("admin"); // Puedes cambiar esto por la sesión actual

            PersonalDAO::guardar($dto);
            header("Location: index.php?c=personal");
        } else {
            require "view/personal/crear.php";
        }
    }

    public function editar() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dto = new PersonalDTO();
            $dto->setId($id);
            $dto->setNombre($_POST['nombre']);
            $dto->setApellido($_POST['apellido']);
            $dto->setCedula($_POST['cedula']);
            $dto->setCargo($_POST['cargo']);
            $dto->setCorreo($_POST['correo']);
            $dto->setTelefono($_POST['telefono']);
            $dto->setUsuarioActualizacion("admin"); // De igual forma, puede ser la sesión

            PersonalDAO::actualizar($dto);
            header("Location: index.php?c=personal");
        } else {
            $registro = PersonalDAO::buscarPorId($id);
            require "view/personal/editar.php";
        }
    }

    public function eliminar() {
        $id = $_GET['id'];
        PersonalDAO::eliminar($id);
        header("Location: index.php?c=personal");
    }
}
