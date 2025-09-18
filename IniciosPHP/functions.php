<?php

function calcularIva($base,$percent){
    $res = $base * $percent /100;
    return $res;
}

calcularIva(100, 21);