<?php
//autor: Carrasco Chimbiligua Claudio Valentino
class PersonalDTO {
    private $id;
    private $nombre;
    private $apellido;
    private $cargo;
    private $fecha_nacimiento;
    private $direccion;
    private $telefono;
    private $email;
    private $fecha_registro;
    private $usuario_creacion;
    private $fecha_actualizacion;
    private $usuario_actualizacion;

    // Getters and Setters for each property

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function getFechaNacimiento() {
        return $this->fecha_nacimiento;
    }

    public function setFechaNacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }

    public function setFechaRegistro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function getUsuarioCreacion() {
        return $this->usuario_creacion;
    }

    public function setUsuarioCreacion($usuario_creacion) {
        $this->usuario_creacion = $usuario_creacion;
    }

    public function getFechaActualizacion() {
        return $this->fecha_actualizacion;
    }

    public function setFechaActualizacion($fecha_actualizacion) {
        $this->fecha_actualizacion = $fecha_actualizacion;
    }

    public function getUsuarioActualizacion() {
        return $this->usuario_actualizacion;
    }

    public function setUsuarioActualizacion($usuario_actualizacion) {
        $this->usuario_actualizacion = $usuario_actualizacion;
    }
}
