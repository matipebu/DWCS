<?php
function inversor(int $numero){
    $numero = strval($numero);
    $resultado = "";
    //Forma 1
    //return strrev($numero);

    //Forma 2
    // for ($i=strlen($numero)-1; $i>=0 ; $i--) { 
    //     $resultado .= $numero[$i];
    // }

    foreach (str_split($numero ) as $letra) {
        $resultado = $letra.$resultado;
    }
    
    return $resultado;

}


    $numero = "3355";
    echo "Inverso de $numero =", inversor($numero);