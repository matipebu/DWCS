<?php
    
//     function sumatorio5 ($n1, $n2, $n3, $n4, $n5){
//     echo "sumatorio($n1, $n2, $n3, $n4, $n5) = ", $n1+$n2+$n3+$n4+$n5;
// }

function sumatorio ($nums){
    $sum = 0;
    $numeros = implode("+", $nums);
    foreach ($nums as $n) {
        $sum += $n;
        // $numeros .= " $n";
    }
    echo "sumatorio($numeros) = ", $sum;
}
    
    

    $numeros = "3,4,5,7,89,2";
    // echo "Ejemplo explode $numeros";
    $numeros = explode(",",$numeros);
    sumatorio($numeros);
   ?>