<!-- autor: Milton Leonardo Lomas Cepeda -->
<?php
session_start();
require_once "model/dao/UsuarioDAO.php";

class UsuarioController {
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
            $lista = UsuarioDAO::buscarPorNombre($texto, $inicio, $limite);
            $total = UsuarioDAO::totalBusqueda($texto);
        } else {
            $lista = UsuarioDAO::listarPaginado($inicio, $limite);
            $total = UsuarioDAO::totalRegistros();
        }

        $totalPaginas = ceil($total / $limite);

        require_once "view/usuario/usuario.list.php";
    }
}
?>
