<?php 
namespace modelo\vo;
class ConductorVO{
    public ?int $id ;
    public ?string $nombre;
    public ?string $apellido1;
    public ?string $apellido2;
    public ?string $licencia;

    

    public function __construct(
        ?string $id = null,
        ?string $nombre = null,
        ?string $apellido1 = null,
        ?string $apellido2 = null,
        ?string $licencia = null
        
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->licencia = $licencia;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of apellido1
     */ 
    public function getApellido1()
    {
        return $this->apellido1;
    }

    /**
     * Set the value of apellido1
     *
     * @return  self
     */ 
    public function setApellido1($apellido1)
    {
        $this->apellido1 = $apellido1;

        return $this;
    }

        /**
         * Get the value of apellido2
         */ 
        public function getApellido2()
        {
                return $this->apellido2;
        }

        /**
         * Set the value of apellido2
         *
         * @return  self
         */ 
        public function setApellido2($apellido2)
        {
                $this->apellido2 = $apellido2;

                return $this;
        }

    /**
     * Get the value of licencia
     */ 
    public function getLicencia()
    {
        return $this->licencia;
    }

    /**
     * Set the value of licencia
     *
     * @return  self
     */ 
    public function setLicencia($licencia)
    {
        $this->licencia = $licencia;

        return $this;
    }
}
?>