<?php
include_once "ej7.php";
 class Curso{

    public $estudiantes;
    public $nombre;


    public function __construct( $nom) {
        $this->estudiantes = [];
        $this->nombre = $nom;
    }


    public function addEstudiante(Estudiante $estudiante){
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

    $d = new Direccion("plaza mayor, 3", "Vilagarcía", "36250");
    $estudiante = new Estudiante("Pedro", 20, $d, "Desarrollo Web");
    $estudiante->addCalificacion(5)
        ->addCalificacion(7)
        ->addCalificacion(8);
    $e2 = clone ($estudiante);
    $e2->setNombre("María")
        ->setEdad(32);
    $curso = new Curso("DAW2-A");
    $curso->addEstudiante($estudiante);
    $curso->addEstudiante($e2);

    echo $curso->mostrarEstudiantes();
?>