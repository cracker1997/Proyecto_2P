<!-- autor: Cabanilla Piza David-->
 <?php

use function PHPSTORM_META\map;

require_once "config/conexion.php";
require_once "model/dto/ActivityDTO.php";

class ActivityDAO{
    public static function listar($fecha){
    $conexion = Conexion::conectar();
    $sql = "SELECT * FROM activities WHERE fecha = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(1, $fecha, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public static function guardar(ActivityDTO $Activity){
        $conexion = Conexion::conectar();
        $sql = "INSERT INTO activities (razon, descripcion, fecha, hora, lugar, usuario_creacion)
        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $Activity->getRazon(),
            $Activity->getDescripcion(),
            $Activity->getFecha(),
            $Activity->getHora(),
            $Activity->getLugar(),
            $Activity->getUsuarioCreacion()
        ]); 
    }

    public static function delete($id){
        $conexion = Conexion::conectar();
        $sql = "DELETE FROM activities WHERE id= ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update(ActivityDTO $Activity){
        $conexion = Conexion::conectar();
        $sql = "UPDATE activities SET razon=?,
        descripcion=?,fecha=?,
        hora=?,lugar=?,
        usuario_creacion=?,fecha_creacion=NOW() WHERE id=?";
        $stmt = $conexion->prepare($sql);
        return $stmt->execute([
            $Activity->getRazon(),
            $Activity->getDescripcion(),
            $Activity->getFecha(),
            $Activity->getHora(),
            $Activity->getLugar(),
            $Activity->getUsuarioCreacion(),
            $Activity->getId()
        ]);
    }

    public static function searchById($id){
        $conexion = Conexion::conectar();
        $sql = "SELECT * FROM activities WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(1,$id,PDO::PARAM_INT); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

