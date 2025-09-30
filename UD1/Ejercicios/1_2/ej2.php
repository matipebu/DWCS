<?php
class Persona{
    protected $nombre;
    private $edad;

    

    function __construct($nombre, $edad){
        $this->nombre = $nombre;
        $this->edad = $edad;

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