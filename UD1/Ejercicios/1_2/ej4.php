<?php
include_once "e03.php";


class Estudiante extends Persona{
    public $grado;
    

    function __construct($nombre, $edad, Direccion $direccion,$grado)
    {
       parent::__construct($nombre,$edad,$direccion);
       $this->grado=$grado;
    }

    public function getGrado()
    {
        return $this->grado;
    }

    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
    }

    public function mostrarInformacion()
    {
        return "Estudiante: ".$this->getNombre()."de".$this->getEdad()."Estudia el grado de ".$this->grado;
    }
}