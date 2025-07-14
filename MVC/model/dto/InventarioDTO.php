<!-- autor: Cusme Fienco Axel -->
<?php
class InventarioDTO {
    public $id;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $estado;
    public $fecha_registro;

    public function usarPOST() {
        $this->nombre = $_POST['nombre'] ?? '';
        $this->descripcion = $_POST['descripcion'] ?? '';
        $this->cantidad = $_POST['cantidad'] ?? 0;
        $this->estado = $_POST['estado'] ?? 'Disponible';
    }
}
