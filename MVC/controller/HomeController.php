<!-- autor: Ordoñez Arreaga Ronny -->
<?php

session_start();

class HomeController
{
    public function index()
    {
        if (!isset($_SESSION['usuario'])) {
            header("Location: index.php?c=Login&a=index");
            exit();
        }

        // Obtenemos el rol del usuario para usarlo en la vista
        $rol = $_SESSION['usuario']['rol'];
        require_once "view/home.php";
    }
}
