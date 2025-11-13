<?php
class Usuario {
    private ?int $id;
    private string $nombre;
    private string $correo;
    private ?string $contrasena;


    // Constructor flexible
    public function __construct(string $nombre,string $correo,?string $contrasena = null,?int $id = null) {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->id = $id;
    }

    // === GETTERS ===
    public function getId(): ?int { return $this->id; }
    public function getNombre(): string { return $this->nombre; }
    public function getCorreo(): string { return $this->correo; }
    public function getContrasena(): ?string { return $this->contrasena; }

    // === SETTERS (opcional) ===
    public function setId(int $id): void { $this->id = $id; }
}

?>
