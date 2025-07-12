<!-- autor: Carrasco Claudio -->
<?php

class PersonalDTO {
    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $cargo;
    private $correo;
    private $telefono;
    private $usuarioCreacion;
    private $usuarioActualizacion;

    // Constructor opcional
    public function __construct($id = null, $nombre = null, $apellido = null, $cedula = null, $cargo = null, $correo = null, $telefono = null, $usuarioCreacion = null, $usuarioActualizacion = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->cargo = $cargo;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->usuarioCreacion = $usuarioCreacion;
        $this->usuarioActualizacion = $usuarioActualizacion;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getCedula() { return $this->cedula; }
    public function getCargo() { return $this->cargo; }
    public function getCorreo() { return $this->correo; }
    public function getTelefono() { return $this->telefono; }
    public function getUsuarioCreacion() { return $this->usuarioCreacion; }
    public function getUsuarioActualizacion() { return $this->usuarioActualizacion; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setCedula($cedula) { $this->cedula = $cedula; }
    public function setCargo($cargo) { $this->cargo = $cargo; }
    public function setCorreo($correo) { $this->correo = $correo; }
    public function setTelefono($telefono) { $this->telefono = $telefono; }
    public function setUsuarioCreacion($usuarioCreacion) { $this->usuarioCreacion = $usuarioCreacion; }
    public function setUsuarioActualizacion($usuarioActualizacion) { $this->usuarioActualizacion = $usuarioActualizacion; }
}
