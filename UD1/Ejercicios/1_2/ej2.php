<?php
class Persona{
    protected $nombre;
    private $edad;
    private Direccion $direccion;

    

    function __construct($nombre, $edad, Direccion $direccion){
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;

    }

    public function getNombre()
    {
        return $this->nombre;
    }

   
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    
    public function getEdad()
    {
        return $this->edad;
    }

    
    public function setEdad($edad)
    {
        if($edad>0){
            
            $this->edad = $edad;
        }

        return $this;
    }

    public function esMayorDeEdad(){
        return $this->edad >=18;

    }
}

?>