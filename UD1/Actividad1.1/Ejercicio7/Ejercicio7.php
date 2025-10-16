<?php
if (isset($_POST['palabra1']) && isset($_POST['palabra2'])) {
    
    $p1 = $_POST['palabra1'];
    $p2 = $_POST['palabra2'];

    $arr1 = str_split($p1);
    $arr2 = str_split($p2);

    sort($arr1);
    sort($arr2);

    if ($arr1 === $arr2) {
        echo "'$p1' es un anagrama de '$p2'.";
    } else {
        echo "'$p1' NO es un anagrama de '$p2'.";
    }
} else {
    echo "No se recibieron palabras.";
}
?>
