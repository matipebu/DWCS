<?php
// clases/Proyecto.php
class Proyecto
{
    private int $id;
    private string $nombre;
    private ?string $descripcion;
    private int $id_responsable;

    /**
     * Constructor
     */
    public function __construct(string $nombre,?string $descripcion = null,int $id_responsable) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->id_responsable = $id_responsable;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function getIdResponsable(): int
    {
        return $this->id_responsable;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = trim($nombre);
    }

    public function setDescripcion(?string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function setIdResponsable(int $id_responsable): void
    {
        $this->id_responsable = $id_responsable;
    }


}