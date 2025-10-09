<?php
function contarPalabras($texto){
    $contador = 0;

    $palabras = explode(' ', $texto);
    foreach ($palabras as $pal) {
        $contador ++;
    }
    return $contador;
}

$texto = "ala oso seres tenet somos casa perro";
echo "Palabras: " . contarPalabras($texto) . "<br>";

?>