<?php
if (isset($_POST['nums'])) {
    $nums = array_map('intval', $_POST['nums']); 

    $mayor = max($nums);
    $menor = min($nums);
    $media = array_sum($nums) / count($nums);

    echo "Mayor: $mayor<br>";
    echo "Menor: $menor<br>";
    echo "Media: $media";
} else {
    echo "No se recibieron números.";
}
?>
