<?php
include_once "clasemadre.php";

class Clasehija extends ClaseMadre{
    private $apellido;

    public function __construct($nombre,$apellido){
        parent::__construct($nombre);
        $this->apellido = $apellido;
    }
    public function repetir(){
        return parent::repetir().$this->apellido;
    }
}
?>