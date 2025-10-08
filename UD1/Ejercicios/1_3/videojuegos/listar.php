<?php
include_once("acceso_datos.php");
if(isset($_GET["eliminar"])){
    $m = "El videojuego no ha sido eliminado";
    if (deleteVideojuego($_GET['eliminar'])){
            $m = "El videojuego ha sido eliminado";


    }
    echo '<script>alert("',$m,'")</script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
</head>
<body>
    <table >
        <tr>
            <th>Nombre</th>
            <th>Plataforma</th>
            <th>Año</th>
            <th>Genero</th>
            <th>Acciones</th>
        </tr>
        <?php
        $videojuegos = getVideojuegos();
        foreach($videojuegos as $v ){
            echo "<tr>";
            echo "<td>", $v->getNombre(),"</td>";
            echo "<td>", $v->getPlataforma(),"</td>";
            echo "<td>", $v->getLanzamiento(),"</td>";
            echo "<td>", $v->getGenero() ??"-","</td>";
            echo "<td> <a href='?eliminar=",$v->getId(),"'>Eliminar</a><a href='modificar.php?id=",$v->getId(),"'>Modificar</a> </td>";

            echo "</tr>";
        }

        ?>

    </table>
    
</body>
</html>