<?php
// autor: Cusme Fienco Axel
require_once "config/conexion.php";
require_once "model/dto/InventarioDTO.php";

class InventarioDAO {
    public static function listar() {
        $con = Conexion::conectar();
        $stmt = $con->query("SELECT * FROM inventario ORDER BY fecha_registro DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function guardar(InventarioDTO $item) {
        $con = Conexion::conectar();
        $stmt = $con->prepare("INSERT INTO inventario (nombre, descripcion, cantidad, estado) VALUES (?, ?, ?, ?)");
        return $stmt->execute([
            $item->nombre,
            $item->descripcion,
            $item->cantidad,
            $item->estado
        ]);
    }

    public static function buscarPorId($id) {
        $con = Conexion::conectar();
        $stmt = $con->prepare("SELECT * FROM inventario WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function actualizar(InventarioDTO $item) {
        $con = Conexion::conectar();
        $stmt = $con->prepare("UPDATE inventario SET nombre = ?, descripcion = ?, cantidad = ?, estado = ? WHERE id = ?");
        return $stmt->execute([
            $item->nombre,
            $item->descripcion,
            $item->cantidad,
            $item->estado,
            $item->id
        ]);
    }

    public static function eliminar($id) {
        $con = Conexion::conectar();
        $stmt = $con->prepare("DELETE FROM inventario WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function listarPaginado($inicio, $limite) {
    $con = Conexion::conectar();
    $stmt = $con->prepare("SELECT * FROM inventario ORDER BY fecha_registro DESC LIMIT ?, ?");
    $stmt->bindValue(1, (int)$inicio, PDO::PARAM_INT);
    $stmt->bindValue(2, (int)$limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public static function totalRegistros() {
    $con = Conexion::conectar();
    $stmt = $con->query("SELECT COUNT(*) as total FROM inventario");
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

public static function buscarPorNombre($texto, $inicio, $limite) {
    $con = Conexion::conectar();
    $stmt = $con->prepare("SELECT * FROM inventario WHERE nombre LIKE ? OR descripcion LIKE ? ORDER BY fecha_registro DESC LIMIT ?, ?");
    $like = "%$texto%";
    $stmt->bindValue(1, $like);
    $stmt->bindValue(2, $like);
    $stmt->bindValue(3, (int)$inicio, PDO::PARAM_INT);
    $stmt->bindValue(4, (int)$limite, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public static function totalBusqueda($texto) {
    $con = Conexion::conectar();
    $stmt = $con->prepare("SELECT COUNT(*) as total FROM inventario WHERE nombre LIKE ? OR descripcion LIKE ?");
    $like = "%$texto%";
    $stmt->execute([$like, $like]);
    return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
}

}
