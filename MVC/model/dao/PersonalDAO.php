<!-- autor: Carrasco Claudio -->
<?php

require_once "config/conexion.php";
require_once "model/dto/PersonalDTO.php";

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
        $sql = "INSERT INTO personal (nombre, apellido, cedula, cargo, correo, telefono, usuario_creacion)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $personal->getNombre(),
            $personal->getApellido(),
            $personal->getCedula(),
            $personal->getCargo(),
            $personal->getCorreo(),
            $personal->getTelefono(),
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
        $sql = "UPDATE personal SET nombre=?, apellido=?, cedula=?, cargo=?, correo=?, telefono=?, 
                fecha_actualizacion=NOW(), usuario_actualizacion=? WHERE id=?";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $personal->getNombre(),
            $personal->getApellido(),
            $personal->getCedula(),
            $personal->getCargo(),
            $personal->getCorreo(),
            $personal->getTelefono(),
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
        $stmt = $conexion->prepare("SELECT * FROM personal WHERE nombre LIKE ? OR apellido LIKE ? LIMIT ?, ?");
        $like = "%$texto%";
        $stmt->bindParam(1, $like);
        $stmt->bindParam(2, $like);
        $stmt->bindParam(3, $inicio, PDO::PARAM_INT);
        $stmt->bindParam(4, $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function totalBusqueda($texto) {
        $conexion = Conexion::conectar();
        $stmt = $conexion->prepare("SELECT COUNT(*) FROM personal WHERE nombre LIKE ? OR apellido LIKE ?");
        $like = "%$texto%";
        $stmt->execute([$like, $like]);
        return $stmt->fetchColumn();
    }
}
