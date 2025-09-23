<?php
function calcularIVA(float $precioBase, int $iva = 21): float {
    $montoIVA = $precioBase * ($iva / 100);
    
    return $precioBase + $montoIVA;
}


$precio = 100.0; 
echo "Precio base: " . $precio . " €<br>";
echo "Precio con IVA (21%): " . calcularIVA($precio) . " €<br>";
?>