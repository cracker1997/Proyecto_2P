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

    public static function listarPaginado($inicio, $limite) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM usuarios LIMIT ?, ?");
        $stmt->bindParam(1, $inicio, PDO::PARAM_INT);
        $stmt->bindParam(2, $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorNombre($texto, $inicio, $limite) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombre LIKE ? LIMIT ?, ?");
        $like = "%$texto%";
        $stmt->bindParam(1, $like);
        $stmt->bindParam(2, $inicio, PDO::PARAM_INT);
        $stmt->bindParam(3, $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function buscarPorId($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function totalRegistros() {
        $conexion = Conexion::conectar();
        $stmt = $conexion->query("SELECT COUNT(*) FROM usuarios");
        return $stmt->fetchColumn();
}

    public static function totalBusqueda($texto) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT COUNT(*) FROM usuarios WHERE nombre LIKE ?");
        $like = "%$texto%";
        $stmt->execute([$like]);
        return $stmt->fetchColumn();
    }

    public static function guardar(UsuarioDTO $usuario) {
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO usuarios (nombre, usuario, clave, rol, fecha_creacion)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);

        return $stmt->execute([
            $usuario->nombre,
            $usuario->usuario,
            sha1($usuario->clave),
            $usuario->rol,
            $usuario->fecha_creacion,
        ]);
    }

    public static function actualizar(UsuarioDTO $usuario) {
        $conexion = Conexion::conectar();
        if ($usuario->clave) {
            $sql = "UPDATE usuarios SET nombre=?, usuario=?, clave=?, rol=? WHERE id=?";
            $stmt = $conexion->prepare($sql);
            return $stmt->execute([
                $usuario->nombre,
                $usuario->usuario,
                sha1($usuario->clave),
                $usuario->rol,
                $usuario->id
            ]);
        } else {
            $sql = "UPDATE usuarios SET nombre=?, usuario=?, rol=? WHERE id=?";
            $stmt = $conexion->prepare($sql);
            return $stmt->execute([
                $usuario->nombre,
                $usuario->usuario,
                $usuario->rol,
                $usuario->id
            ]);
        }
    }

    public static function es_admin($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT rol FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }

    public static function eliminar($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
