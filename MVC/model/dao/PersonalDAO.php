<?php

require_once "config/conexion.php";
require_once "model/dto/PersonalDTO.php"; // Assuming you have a PersonalDTO.php

class PersonalDAO {
    public static function listarPaginado($inicio, $limite) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM personal LIMIT ?, ?");
        $stmt->bindParam(1, $inicio, PDO::PARAM_INT);
        $stmt->bindParam(2, $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function totalRegistros() {
        $conexion = Conexion::conectar();
        $stmt = $conexion->query("SELECT COUNT(*) FROM personal");
        return $stmt->fetchColumn();
    }

    public static function guardar(PersonalDTO $personal) {
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO personal (nombre, apellido, cargo, fecha_nacimiento, direccion, telefono, email, usuario_creacion)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $personal->getNombre(),
            $personal->getApellido(),
            $personal->getCargo(),
            $personal->getFechaNacimiento(),
            $personal->getDireccion(),
            $personal->getTelefono(),
            $personal->getEmail(),
            $personal->getUsuarioCreacion()
        ]);
    }

    public static function buscarPorId($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM personal WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizar(PersonalDTO $personal) {
        $conexion = Conexion::conectar();
        $sql = "UPDATE personal SET nombre=?, apellido=?, cargo=?, fecha_nacimiento=?, direccion=?, telefono=?, email=?,
                fecha_actualizacion=NOW(), usuario_actualizacion=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $personal->getNombre(),
            $personal->getApellido(),
            $personal->getCargo(),
            $personal->getFechaNacimiento(),
            $personal->getDireccion(),
            $personal->getTelefono(),
            $personal->getEmail(),
            $personal->getUsuarioActualizacion(),
            $personal->getId()
        ]);
    }

    public static function eliminar($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("DELETE FROM personal WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function buscarPorNombre($texto, $inicio, $limite) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM personal WHERE nombre LIKE ? OR apellido LIKE ? OR cargo LIKE ? LIMIT ?, ?");
        $like = "%$texto%";
        $stmt->bindParam(1, $like);
        $stmt->bindParam(2, $like);
        $stmt->bindParam(3, $like);
        $stmt->bindParam(4, $inicio, PDO::PARAM_INT);
        $stmt->bindParam(5, $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function totalBusqueda($texto) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT COUNT(*) FROM personal WHERE nombre LIKE ? OR apellido LIKE ? OR cargo LIKE ?");
        $like = "%$texto%";
        $stmt->execute([$like, $like, $like]);
        return $stmt->fetchColumn();
    }
}