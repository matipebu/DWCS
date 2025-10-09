<?php
function contarVocales($texto){
$vocales = 0;
$texto = strtolower($texto);

for($i = 0;$i = strlen($texto);$i++){
    if(strpos('aeiou',$texto)){
    $vocales++;

    }

    return $vocales;

}
}
?>