<?php
//autor: Ronny Ordoñez

require_once "config/conexion.php";
require_once "model/dto/NinoDTO.php";

class NinoDAO {
    public static function listar() {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM ninos");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function guardar(NinoDTO $nino) {
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO ninos (nombre, apellido, fecha_nacimiento, genero, nivel, tutor, usuario_creacion, alergias, detalle_alergias)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $nino->getNombre(),
            $nino->getApellido(),
            $nino->getFechaNacimiento(),
            $nino->getGenero(),
            $nino->getNivel(),
            $nino->getTutor(),
            $nino->getUsuarioCreacion(),
            $nino->getAlergias(),
            $nino->getDetalleAlergias()
        ]);
    }

    public static function buscarPorId($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT * FROM ninos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizar(NinoDTO $nino) {
        $conexion = Conexion::conectar();
        $sql = "UPDATE ninos SET nombre=?, apellido=?, fecha_nacimiento=?, genero=?, nivel=?, tutor=?, alergias=?, detalle_alergias=?, 
                fecha_actualizacion=NOW(), usuario_actualizacion=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $nino->getNombre(),
            $nino->getApellido(),
            $nino->getFechaNacimiento(),
            $nino->getGenero(),
            $nino->getNivel(),
            $nino->getTutor(),
            $nino->getAlergias(),
            $nino->getDetalleAlergias(),
            $nino->getUsuarioActualizacion(),
            $nino->getId()
        ]);
    }

    public static function eliminar($id) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("DELETE FROM ninos WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
