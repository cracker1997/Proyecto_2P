<?php
//autor: Ronny Ordoñez

class NinoDTO {
    private $id;
    private $nombre;
    private $apellido;
    private $fecha_nacimiento;
    private $genero;
    private $nivel;
    private $tutor;
    private $alergias;
    private $detalle_alergias;
    private $fecha_registro;
    private $usuario_creacion;
    private $fecha_actualizacion;
    private $usuario_actualizacion;

    public function getId() { return $this->id; }
    public function setId($id) { $this->id = $id; }

    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }

    public function getApellido() { return $this->apellido; }
    public function setApellido($apellido) { $this->apellido = $apellido; }

    public function getFechaNacimiento() { return $this->fecha_nacimiento; }
    public function setFechaNacimiento($fecha_nacimiento) { $this->fecha_nacimiento = $fecha_nacimiento; }

    public function getGenero() { return $this->genero; }
    public function setGenero($genero) { $this->genero = $genero; }

    public function getNivel() { return $this->nivel; }
    public function setNivel($nivel) { $this->nivel = $nivel; }

    public function getTutor() { return $this->tutor; }
    public function setTutor($tutor) { $this->tutor = $tutor; }

    public function getAlergias() { return $this->alergias; }
    public function setAlergias($alergias) { $this->alergias = $alergias; }

    public function getDetalleAlergias() { return $this->detalle_alergias; }
    public function setDetalleAlergias($detalle) { $this->detalle_alergias = $detalle; }

    public function getFechaRegistro() { return $this->fecha_registro; }
    public function setFechaRegistro($fecha_registro) { $this->fecha_registro = $fecha_registro; }

    public function getUsuarioCreacion() { return $this->usuario_creacion; }
    public function setUsuarioCreacion($usuario_creacion) { $this->usuario_creacion = $usuario_creacion; }

    public function getFechaActualizacion() { return $this->fecha_actualizacion; }
    public function setFechaActualizacion($fecha_actualizacion) { $this->fecha_actualizacion = $fecha_actualizacion; }

    public function getUsuarioActualizacion() { return $this->usuario_actualizacion; }
    public function setUsuarioActualizacion($usuario_actualizacion) { $this->usuario_actualizacion = $usuario_actualizacion; }
}
