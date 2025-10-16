<?php
if (isset($_POST['numero'])) {
    $numero = (int) $_POST['numero'];

    if ($numero > 0) {
        echo "El número $numero es positivo.";
    } elseif ($numero < 0) {
        echo "El número $numero es negativo.";
    } else {
        echo "El número es cero.";
    }
} else {
    echo "No se recibió ningún número.";
}
?>
