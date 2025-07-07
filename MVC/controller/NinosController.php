<!-- autor: Ordoñez Arreaga Ronny -->
<?php
session_start();
require_once "model/dao/NinoDAO.php";
require_once "model/dto/NinoDTO.php";

class NinosController {

    public function index() {
    if (!isset($_SESSION['usuario'])) {
        header("Location: index.php?c=Login");
        exit();
    }

    $limite = 5;
    $pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    $inicio = ($pagina - 1) * $limite;

    if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
        $texto = trim($_GET['buscar']);
        $lista = NinoDAO::buscarPorNombre($texto, $inicio, $limite);
        $total = NinoDAO::totalBusqueda($texto);
    } else {
        $lista = NinoDAO::listarPaginado($inicio, $limite);
        $total = NinoDAO::totalRegistros();
    }

    $totalPaginas = ceil($total / $limite);

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

        // Validaciones del lado del servidor
        if (
            empty($_POST['nombre']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['nombre']) ||
            empty($_POST['apellido']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['apellido']) ||
            empty($_POST['fecha_nacimiento']) || $_POST['fecha_nacimiento'] > date('Y-m-d') ||
            empty($_POST['genero']) || !in_array($_POST['genero'], ['Masculino', 'Femenino']) ||
            empty($_POST['nivel']) ||
            empty($_POST['tutor'])
        ) {
            echo "<script>alert('Error: datos inválidos. Verifica el formulario.'); window.history.back();</script>";
            return;
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

        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "<script>alert('ID inválido.'); window.location.href='index.php?c=Ninos';</script>";
            return;
        }

        $dato = NinoDAO::buscarPorId($id);
        require_once "view/nino/nino.edit.php";
    }

    public function actualizar() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login");
            exit();
        }

        // Validaciones del lado del servidor
        if (
            empty($_POST['id']) || !is_numeric($_POST['id']) ||
            empty($_POST['nombre']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['nombre']) ||
            empty($_POST['apellido']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['apellido']) ||
            empty($_POST['fecha_nacimiento']) || $_POST['fecha_nacimiento'] > date('Y-m-d') ||
            empty($_POST['genero']) || !in_array($_POST['genero'], ['Masculino', 'Femenino']) ||
            empty($_POST['nivel']) ||
            empty($_POST['tutor'])
        ) {
            echo "<script>alert('Error: datos inválidos. Verifica el formulario.'); window.history.back();</script>";
            return;
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

        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "<script>alert('ID inválido.'); window.location.href='index.php?c=Ninos';</script>";
            return;
        }

        NinoDAO::eliminar($id);
        header("Location: index.php?c=Ninos");
    }
}
