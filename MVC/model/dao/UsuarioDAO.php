<?php
//autor: Ronny Ordoñez
require_once "config/conexion.php";

class UsuarioDAO {
    public static function verificarCredenciales($usuario, $clave) {
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND clave = SHA1(:clave)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->bindParam(":clave", $clave);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // devuelve array si encuentra usuario, false si no
    }
}
