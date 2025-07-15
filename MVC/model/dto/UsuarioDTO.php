<?php
//autor: Milton Leonardo Lomas Cepeda

class UsuarioDTO {
    // No voy a definir un moton de getters y setters si va a hacer lo mismo
    // que acceder directamente a las variables.
    public $id, $nombre, $usuario, $clave, $rol, $fecha_creacion;

    public function usarPOST() {
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->usuario = $_POST['usuario'];
        $this->rol = $_POST['rol'];
        $this->clave = $_POST['clave'];
    }
}
