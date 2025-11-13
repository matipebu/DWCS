<?php
include_once "funciones.php";
session_start();

if (!isset($_SESSION['logged']) || !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'responsable') {
    header("Location: login.php");
    exit;
}
$usuario = $_SESSION['logged'];
$proyectos = getProyectosByRol($usuario);





?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos proyectos_programador</title>
</head>

<body>
    <h2>Proyectos Responsable</h2><br>

    <?php
    foreach ($proyectos as $proyecto) {
        echo ' <article style="border: 1px solid;" "gap:2px;">';
        echo '<h3>' . $proyecto->getNombre() . '</h3>';
        echo '<p>' . $usuario->getNombre() . '</p>';
        echo '<p>' . $proyecto->getDescripcion() . '</p>';
        echo '<a href="modificar_proyecto.php?id='.$proyecto->getId().'">Administrar</a>';
        echo '</article>';
    }
    ?>
</body>

</html>