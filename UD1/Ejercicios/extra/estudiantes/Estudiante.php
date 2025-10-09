<?php
include_once 'Persona.php';
include_once 'Identificable.php';
class Estudiante extends Persona{
    public $calificaciones = [];


    public function __construct($nombre,$ap1,$ap2,$edad,$correo,$calificaciones = [],$contraseña) {
        parent::__construct($nombre,$ap1,$ap2,$edad,$correo,$contraseña);
        $this->calificaciones = $calificaciones;
    }

     public function addCalificacion($calificacion){
       $this->calificaciones = $calificacion;
    }
    

    public function getIdentificador(){
        return hash('md5', $this->correo);
    }

     public function mostrarInformacion(){
        return parent::mostrarInformacion()."Promedio: ".calcularPromedio($this->calificaciones);

    }

    function calcularPromedio($cualificaciones){
    $sumanotas=0;
    foreach ($cualificaciones as $nota) {
        $sumanotas = $nota;
    }
    

    return $sumanotas/count($cualificaciones);
    }
}
?>