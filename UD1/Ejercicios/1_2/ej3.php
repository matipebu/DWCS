<?php
//CLASE DIRECCION  
class Direccion{
    private $calle;
    private $ciudad;
    private $cp;


    function __construct($calle, $ciudad, $cp){
        $this->calle = $calle;
        $this->ciudad = $ciudad;
        $this->cp = $cp;
    }

    public function getCalle()
    {
        return $this->calle;
    }


    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

  
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    public function getCp()
    {
        return $this->cp;
    }

  
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

      public function print()
    {
        return $this->calle . ", " . $this->ciudad . " (" . $this->cp . ")";
    }

    

}


//CLASE PERSONA
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
    public function mostrarDireccion(){
        return $this->direccion ->print();
    }
    
     public function mostrarInformacion(){
        return "$this->nombre, $this->edad años, ".$this->direccion->print();
    }
}



?>