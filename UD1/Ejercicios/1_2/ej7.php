<?php
include_once "ej3.php";


class Estudiante extends Persona{
    public $grado;
    public $calificaciones;
    

    function __construct($nombre, $edad, Direccion $direccion,$grado)
    {
       parent::__construct($nombre,$edad,$direccion);
       $this->grado=$grado;
       $this->calificaciones = [];
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

    public static function calcularPromedio(array $notas){
        $sumaNotas=0;
        foreach($notas as $nota){
            $sumaNotas += $nota;
        }

        $media=$sumaNotas/count($notas);

        return $media;
    }

    public function addCalificacion(int $calificacion){
        $this->calificaciones[]=$calificacion;
        return $this;
    }

    public function getMedia(){
        return Estudiante::calcularPromedio($this->calificaciones);

    }
}