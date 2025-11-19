<?php

include_once "conexionBD.php";

// RECUPERACION DE DATOS
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

// Llamar a getEquipos con el parámetro de filtro
$equipos = getEquipos($filter);
$order = isset($_GET['order']) ? $_GET['order'] : 'nombre';


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/listar_equipos.css">
    <title>Listado de equipos</title>
</head>
<body>
    <h1>Lista de equipos</h1>
    <fieldset>
        <legend>Filtro de equipos</legend>
        <form method="GET">
            <label for="filter">Nombre</label>
            <input type="text" name="filter" value="<?= $filter; ?>">
            <button type="submit">Filtrar</button>
        </form>
    </fieldset>
    <table>
        <?php
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Contacto</th>";
        echo "<th>Participantes</th>";
        echo "<th>Puntuación</th>";
        echo "<th>Editar</th>";

        echo "</tr>";
        
        if (!empty($equipos)) {
            foreach ($equipos as $equipo) {
                echo "<tr>";
                echo "<td>" . $equipo->nombre . "</td>";
                echo "<td>" . $equipo->email . "</td>";
                echo "<td>" . $equipo->num_integrantes . "</td>";
                echo "<td>" . $equipo->puntuacion . "</td>";
                echo "<td><a href ='modificar_equipo.php?id_equipo=",$equipo->id_equipo,"'>EDITAR</a></td>";

                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>