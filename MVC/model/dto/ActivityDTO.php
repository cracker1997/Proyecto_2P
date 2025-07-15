

<?php
//autor: Cabanilla David Eduardo
class ActivityDTO {
    private $id;
    private $razon;
    private $descripcion;
    private $fecha;
    private $hora;
    private $lugar;
    private $fecha_registro;
    private $usuario_creacion;
 
    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }
    public function getRazon() { return $this->razon; }
    public function setRazon($razon) { $this->razon = $razon; }
    public function getDescripcion() { return $this->descripcion; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function getFecha() { return $this->fecha; }
    public function setFecha($fecha) { $this->fecha = $fecha; }
    public function getHora() { return $this->hora; }
    public function setHora($hora) { $this->hora = $hora; }
    public function getLugar() { return $this->lugar; }
    public function setLugar($lugar) { $this->lugar = $lugar; }
    public function getFechaRegistro() { return $this->fecha_registro; }
    public function setFechaRegistro($fecha_registro) { $this->fecha_registro = $fecha_registro; }
    public function getUsuarioCreacion() { return $this->usuario_creacion; }
    public function setUsuarioCreacion($usuario_creacion) { $this->usuario_creacion = $usuario_creacion; }

}
