<?php
function volumenCilindro($radio, $altura){
    $numeroPi = 3.1416;
    return $radio**2 *$altura * $numeroPi;

}

echo volumenCilindro(12,51);