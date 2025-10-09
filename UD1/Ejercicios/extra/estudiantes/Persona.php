<?php
include_once "personaAbstracta.php";
class Persona extends PersonaAbstracta{
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $edad;
    public $correo;

    public $contraseña;

    public function __construct($nombre,$ap1,$ap2,$edad,$correo, $contraseña) {
        $this->nombre = $nombre;
        $this->ap1 = $ap1;
        $this->ap2 = $ap2;
        $this->correo = $correo;
        $this->contraseña = $contraseña;
      

        if($edad>0&&$edad<120){
            $this->edad = $edad;
        }else{
            echo "La edad es incorrecta.";
        }
    }

    public function mostrarInformacion(){

        return "Nombre: ".$this->nombre."Primer Apellido: ".$this->apellido1."Segundo Apellido: ".$this->apellido2."Edad: ".$this->edad."Correo: ".$this->correo;
    }

     public function esMayorDeEdad(): string{
        if ($this->edad > 18) return "Es mayor de edad";
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
     * Get the value of edad
     */ 
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * Set the value of edad
     *
     * @return  self
     */ 
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of contraseña
     */ 
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Set the value of contraseña
     *
     * @return  self
     */ 
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;

        return $this;
    }
}
?>