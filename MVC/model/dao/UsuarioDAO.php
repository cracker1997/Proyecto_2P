<?php
//autor: 
require_once "config/conexion.php";

class UsuarioDAO {
    public static function verificarCredenciales($usuario, $clave) {
    $conexion = Conexion::conectar();
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = ? AND clave = ?");
    
    // Encriptamos la clave con sha1 antes de enviarla
    $claveEncriptada = sha1($clave);

    $stmt->execute([$usuario, $claveEncriptada]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
}
