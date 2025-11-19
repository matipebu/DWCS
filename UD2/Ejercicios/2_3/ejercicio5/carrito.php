<?php
    include_once "funciones.php";
    $idCarrito = $_COOKIE['carrito'];
    $productosCarrito=getProductosCarrito($idCarrito);
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <?php
        foreach ($productosCarrito as $prod) {
            echo "<tr>";
            echo "<td>".$prod->nombre."</td>";
            echo "<td>".$prod->descripcion."</td>";
            echo "<td>".$prod->precio."</td>";
            echo "</tr>";
        }
    
    ?>
    </table>
    <br><a href="index.php">Seguir comprando</a>

    
</body>
</html>