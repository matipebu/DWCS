<?php
define("USER","admin");
define("PASS",'$2y$12$f3X/J1rf5ZEnSXVIFR0yrOzc17kQy60yrq/3YJMQ9nglzi5NvkeUK');

function calcularIva($base, $percent=21){

    $resultado = $base * $percent /100;
    return $resultado;
}

function login($user, $pass){
    return !empty($user) && !empty($pass) && $user === USER && password_verify($pass,PASS);
}


function login2($user, $pass){
    $hash = password_hash($pass);
    return !empty($user) && !empty($pass) && $user == USER && $hash == PASS;
}

function sumatorio5 ($n1, $n2, $n3, $n4, $n5){
    echo "sumatorio($n1, $n2, $n3, $n4, $n5) = ", $n1+$n2+$n3+$n4+$n5;
}

function sumatorio ($nums){
    $sum = 0;
    $numeros = implode("+", $nums);
    foreach ($nums as $n) {
        $sum += $n;
        // $numeros .= " $n";
    }
    echo "sumatorio($numeros) = ", $sum;
}

function volumenCilindro($radio, $altura){
    $numeroPi = 3.1416;
    return $radio**2 * $altura * $numeroPi;
}

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