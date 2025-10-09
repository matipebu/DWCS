<?php
include_once "Estudiante.php";
class Curso{
    public $estudiantes;
     public $nombre;


    public function __construct( $nom) {
        $this->estudiantes = [];
        $this->nombre = $nom;
    }

    function agregarEstudiante(Estudiante $estudiante){
        $this->estudiantes[] = $estudiante;
    }
    public function mostrarEstudiantes(){
        $toret='';
        foreach($this->estudiantes as $estudiante){
            $toret.="<br>".$estudiante->mostrarInformacion();


        }
        return $toret;
    }

}

?>