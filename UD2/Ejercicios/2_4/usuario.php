<?php
class Usuario {
    private $nombre;
    private $correo;
    private $rol_id;
    private $contrasena;

    public function __construct($nombre, $correo, $rol_id, $contrasena) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->rol_id = $rol_id;
        $this->contrasena = $contrasena;
    }

    public function getNombre() { return $this->nombre; }
    public function getCorreo() { return $this->correo; }
    public function getRolId() { return $this->rol_id; }
    public function getContrasena() { return $this->contrasena; }
}

?>
