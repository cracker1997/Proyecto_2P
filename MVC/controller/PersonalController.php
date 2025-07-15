<?php
//autor: Carrasco Chimbiligua Claudio Valentino
session_start();
require_once "model/dao/PersonalDAO.php";
require_once "model/dto/PersonalDTO.php";

class PersonalController {

    private function verificarAcceso($rolesPermitidos) {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }
        $rol = $_SESSION['usuario']['rol'];
        if (!in_array($rol, $rolesPermitidos)) {
            echo "<script>alert('Acceso denegado. No tienes los permisos necesarios.'); window.location.href='index.php?c=Home';</script>";
            exit();
        }
    }

    public function index() {
        $this->verificarAcceso(['Administrador']);

        $limite = 5;
        $pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
        $inicio = ($pagina - 1) * $limite;

        if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
            $texto = trim($_GET['buscar']);
            $datos = PersonalDAO::buscarPorNombre($texto, $inicio, $limite);
            $total = PersonalDAO::totalBusqueda($texto);
        } else {
            $datos = PersonalDAO::listarPaginado($inicio, $limite);
            $total = PersonalDAO::totalRegistros();
        }

        $totalPaginas = ceil($total / $limite);

        require_once "view/personal/personal.list.php";
    }

    public function nuevo() {
        $this->verificarAcceso(['Administrador']);
        require_once "view/personal/personal.new.php";
    }

    public function guardar() {
        $this->verificarAcceso(['Administrador']);

        // Validaciones básicas de los campos
        if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cargo']) ||
            empty($_POST['fecha_nacimiento']) || empty($_POST['direccion']) ||
            empty($_POST['telefono']) || empty($_POST['email'])) {
            echo "<script>alert('Error: Todos los campos obligatorios deben ser llenados.'); window.history.back();</script>";
            return;
        }

        // Crear una instancia de PersonalDTO y asignar los valores del POST
        $personal = new PersonalDTO();
        $personal->setNombre($_POST['nombre']);
        $personal->setApellido($_POST['apellido']);
        $personal->setCargo($_POST['cargo']);
        $personal->setFechaNacimiento($_POST['fecha_nacimiento']);
        $personal->setDireccion($_POST['direccion']);
        $personal->setTelefono($_POST['telefono']);
        $personal->setEmail($_POST['email']);
        $personal->setUsuarioCreacion($_SESSION['usuario']['nombre']); // Asigna el usuario de la sesión

        // Llamar al método guardar del DAO
        PersonalDAO::guardar($personal);

        // Redireccionar a la lista de personal
        header("Location: index.php?c=Personal");
    }

    public function editar() {
        $this->verificarAcceso(['Administrador']);

        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "<script>alert('ID de personal inválido.'); window.location.href='index.php?c=Personal';</script>";
            return;
        }

        $dato = PersonalDAO::buscarPorId($id);
        if (!$dato) {
            echo "<script>alert('Personal no encontrado.'); window.location.href='index.php?c=Personal';</script>";
            return;
        }

        require_once "view/personal/personal.edit.php";
    }

    public function actualizar() {
        $this->verificarAcceso(['Administrador']);

        // Validaciones básicas de los campos
        if (empty($_POST['id']) || !is_numeric($_POST['id']) ||
            empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['cargo']) ||
            empty($_POST['fecha_nacimiento']) || empty($_POST['direccion']) ||
            empty($_POST['telefono']) || empty($_POST['email'])) {
            echo "<script>alert('Error: Datos inválidos. Verifica el formulario.'); window.history.back();</script>";
            return;
        }

        // Crear una instancia de PersonalDTO y asignar los valores del POST
        $personal = new PersonalDTO();
        $personal->setId($_POST['id']);
        $personal->setNombre($_POST['nombre']);
        $personal->setApellido($_POST['apellido']);
        $personal->setCargo($_POST['cargo']);
        $personal->setFechaNacimiento($_POST['fecha_nacimiento']);
        $personal->setDireccion($_POST['direccion']);
        $personal->setTelefono($_POST['telefono']);
        $personal->setEmail($_POST['email']);
        $personal->setUsuarioActualizacion($_SESSION['usuario']['nombre']); // Asigna el usuario de la sesión

        // Llamar al método actualizar del DAO
        PersonalDAO::actualizar($personal);

        // Redireccionar a la lista de personal
        header("Location: index.php?c=Personal");
    }

    public function eliminar() {
        $this->verificarAcceso(['Administrador']);

        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "<script>alert('ID de personal inválido.'); window.location.href='index.php?c=Personal';</script>";
            return;
        }

        PersonalDAO::eliminar($id);

        // Redireccionar a la lista de personal
        header("Location: index.php?c=Personal");
    }
}
