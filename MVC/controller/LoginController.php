<!-- autor: Ordoñez Arreaga Ronny -->
<?php
session_start();
require_once "model/dao/UsuarioDAO.php";

class LoginController {
    public function index() {
        require_once "view/login.php";
    }

    public function validar() {
        $usuario = $_POST['usuario'] ?? '';
        $clave = $_POST['clave'] ?? '';

        $usuarioBD = UsuarioDAO::verificarCredenciales($usuario, $clave);

        if ($usuarioBD) {
            $_SESSION['usuario'] = [
                'id' => $usuarioBD['id'],
                'nombre' => $usuarioBD['nombre'],
                'rol' => $usuarioBD['rol']
            ];
            header("Location: index.php?c=Home");
        } else {
            $error = "Usuario o clave incorrectos";
            require_once "view/login.php";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?c=Login");
    }
}
