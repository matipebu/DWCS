<?php
include_once "funciones.php";
$productos = getProductos();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <table>
        <tr>
            <th>Producto</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Carrito</th>

        </tr>
        
        <?php
          if (!empty($productos)) {
            foreach ($productos as $producto) {
                echo "<tr>";
                    echo "<td>" . $producto->nombre . "</td>";
                    echo "<td>" . $producto->descripcion . "</td>";
                    echo "<td>" . $producto->precio . "</td>";
                    echo "<td> <a href='?carrito=".$producto->id."'>Carrito</a></td>";
                echo "</tr>";
            }
        } 
        ?>
    </table>
    
</body>
</html>