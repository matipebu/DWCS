<?php
include_once "funciones.php";
include_once "usuario.php";
include_once "proyecto.php";
session_start();


if (!isset($_SESSION['logged']) || !isset($_SESSION['rol']) || $_SESSION['rol'] !== 'programador') {
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
    <title>Proyectos Programador</title>
</head>
<body>
      <h2>Proyectos Programador</h2><br>

    <?php
    foreach ($proyectos as $proyecto) {
        $responsable = getUsuarioById($proyecto->getIdResponsable());
        echo ' <article style="border: 1px solid;" "gap:2px;">';
        echo '<h3>' . $proyecto->getNombre() . '</h3>';
        echo '<p>' . $responsable->getNombre() . '</p>';
        echo '<p>' . $proyecto->getDescripcion() . '</p>';
        echo '<a href="info_proyecto.php?id='.$proyecto->getId().'">Ver</a>';
        echo '</article>';
    }
    ?>
    
</body>
</html>