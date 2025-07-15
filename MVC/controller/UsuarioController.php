<?php
//autor: Milton Leonardo Lomas Cepeda

session_start();
require_once "model/dao/UsuarioDAO.php";
require_once "model/dto/UsuarioDTO.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] != 'Administrador') {
    header("Location: index.php?c=Home");
    exit();
}

class UsuarioController {
    public function index() {
        $limite = 5;
        $pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
        $inicio = ($pagina - 1) * $limite;

        if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
            $texto = trim($_GET['buscar']);
            $lista = UsuarioDAO::buscarPorNombre($texto, $inicio, $limite);
            $total = UsuarioDAO::totalBusqueda($texto);
        } else {
            $lista = UsuarioDAO::listarPaginado($inicio, $limite);
            $total = UsuarioDAO::totalRegistros();
        }

        $totalPaginas = ceil($total / $limite);

        require_once "view/usuario/usuario.list.php";
    }

    public function nuevo() {
        require_once "view/usuario/usuario.new.php";
    }

    public function guardar() {
        if (
            empty($_POST['nombre']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['nombre']) ||
            empty($_POST['usuario']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['usuario']) ||
            empty($_POST['rol']) || !in_array($_POST['rol'], ['Administrador', 'Docente', 'Inventario']) ||
            empty($_POST['clave'])
        ) {
            echo "<script>alert('Error: datos inválidos. Verifica el formulario.'); window.history.back();</script>";
            return;
        }

        $usuario = new UsuarioDTO();
        $usuario->usarPOST();
        $usuario->fecha_creacion = date('Y-m-d H:i:s');

        UsuarioDAO::guardar($usuario);
        header("Location: index.php?c=Usuario");
    }

    public function eliminar() {
        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "<script>alert('ID inválido.'); window.location.href='index.php?c=Usuario';</script>";
            return;
        }

        UsuarioDAO::eliminar($id);
        header("Location: index.php?c=Usuario");
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "<script>alert('ID inválido.'); window.location.href='index.php?c=Usuario';</script>";
            return;
        }
        $usuario = UsuarioDAO::buscarPorId($id);
        require_once "view/usuario/usuario.edit.php";
    }

    public function actualizar() {
        // Validaciones del lado del servidor
        if (
            empty($_POST['nombre']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['nombre']) ||
            empty($_POST['usuario']) || !preg_match("/^[a-zA-ZÁÉÍÓÚáéíóúñÑ ]+$/", $_POST['usuario']) ||
            empty($_POST['rol']) || !in_array($_POST['rol'], ['Administrador', 'Docente', 'Inventario'])
        ) {
            echo "<script>alert('Error: datos inválidos. Verifica el formulario.'); window.history.back();</script>";
            return;
        }

        $usuario = new UsuarioDTO();
        $usuario->usarPOST();

        UsuarioDAO::actualizar($usuario);

        header("Location: index.php?c=Usuario");
    }
}
?>
