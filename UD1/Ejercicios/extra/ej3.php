<?php
function extraerPalindromos($texto) {
    $palabras = explode(' ', strtolower($texto));
    $palindromos = [];

    foreach($palabras as $pal){
        if ($pal ==strrev($pal)){
            $palindromos[]= $pal;

        }
    }
    return "Lista de palíndromos: " . implode(', ', $palindromos) . "<br>";;
}
$texto = "ala oso seres tenet somos casa perro";
echo extraerPalindromos($texto);
filter_var($email,FILTER_VALIDATE_EMAIL,FILTER_FLAG_EMAIL_UNICODE)
?>

