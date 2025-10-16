<?php
if (isset($_POST['A']) && isset($_POST['B'])) {
    $a = (int) $_POST['A'];
    $b = (int) $_POST['B'];

    $resultado = $a ** $b; 

    echo "El resultado de $a elevado a $b es: $resultado";
} else {
    echo "No se recibieron números.";
}
?>
