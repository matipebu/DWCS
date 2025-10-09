<?php
function calcularPromedio(array $cualificaciones){
    $sumanotas=0;
    foreach ($cualificaciones as $nota) {
        $sumanotas = $nota;
    }

    return $sumanotas/count($cualificaciones);
}

function invertirNumero($num){
   return (int)strrev((string)$num);
}

function clasificarEdad($edad) {
    if ($edad < 18) return "Menor";
    if ($edad <= 65) return "Adulto";
    return "Mayor";
}

?>


