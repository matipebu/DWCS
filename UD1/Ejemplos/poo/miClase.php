<?php
class MiClase{
private $var1;
private $var2;

//Metodo estatico
public static function saludo(){
    return "soy la clase!";
}


public function __construct(){
    $this->var1 = "Soy var 1";
    $this->var2 = "Soy var 2";
}

public function getVar1(){
    return $this->var1;
}

public function setVar1($var1){
    return $this->var1=$var1;
}

public function setVar2($var2){
    return $this->var1=$var2;
}

private function concat(){
    return $this->var1.$this->var2;
}

public function print(){
    return $this->concat();
}

}


?>