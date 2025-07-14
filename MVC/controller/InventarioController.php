<?php
//autor: Cusme Fienco Axel
require_once "model/dto/InventarioDTO.php";
require_once "model/dao/InventarioDAO.php";

class InventarioController {
    public function index() {
    $limite = 5;
    $pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $inicio = ($pagina - 1) * $limite;

    if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
        $texto = trim($_GET['buscar']);
        $lista = InventarioDAO::buscarPorNombre($texto, $inicio, $limite);
        $total = InventarioDAO::totalBusqueda($texto);
    } else {
        $lista = InventarioDAO::listarPaginado($inicio, $limite);
        $total = InventarioDAO::totalRegistros();
    }

    $totalPaginas = ceil($total / $limite);
    require_once "view/inventario/inventario.list.php";
}


    public function nuevo() {
        require_once "view/inventario/inventario.new.php";
    }

    public function guardar() {
        $item = new InventarioDTO();
        $item->usarPOST();
        InventarioDAO::guardar($item);
        header("Location: index.php?c=Inventario");
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "<script>alert('ID inválido'); location.href='index.php?c=Inventario';</script>";
            return;
        }

        $item = InventarioDAO::buscarPorId($id);
        require_once "view/inventario/inventario.edit.php";
    }

    public function actualizar() {
        $item = new InventarioDTO();
        $item->id = $_POST['id'];
        $item->usarPOST();
        InventarioDAO::actualizar($item);
        header("Location: index.php?c=Inventario");
    }

    public function eliminar() {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            InventarioDAO::eliminar($id);
        }
        header("Location: index.php?c=Inventario");
    }
}
