<?php
include_once "e03.php";


class Profesor extends Persona{

    private $especialidad;

    function __construct($nombre, $edad, $direccion,$especialidad)
    {
        parent::__construct($nombre, $edad, $direccion);
        $this->especialidad=$especialidad;

    }
    

    public function getEspecialidad()
    {
        return $this->especialidad;
    }

    public function setEspecialidad($especialidad)
    {
        $this->especialidad = $especialidad;

        return $this;
    }

    public function mostrarInformacion(){
        return parent::mostrarInformacion()." especialidad: $this->especialidad ";
    }
}