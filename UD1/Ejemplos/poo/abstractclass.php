<?php

abstract class Abstractclass{
    protected $lados = [];
    

    public function __construct($lados){
        $this->lados = $lados;

    }

    public function getPerimetro(){
        $peri = 0;
        foreach($this->lados as $l){
         $peri += $l;   
        }
        return $peri;
    }
    
    abstract public function getArea();
}

?>