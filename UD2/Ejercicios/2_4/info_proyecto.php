<?php
include_once "funciones.php";

if (!isset($_REQUEST["id"])) {
    die("No se ha especificado el proyecto.");
}

$idProyecto = (int) $_REQUEST["id"];
$proyecto = getProyectoById($idProyecto);



$proyecto = getProyectoById($idProyecto);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1><?= $proyecto->getNombre(); ?></h1>
  
    <input type="hidden" name="id_proyecto" value="<?= $idProyecto; ?>">

    <label for="desc">Descripción:</label>
    <input type="text" name="desc" value="<?=$proyecto->getDescripcion(); ?>"><br>
</body>

</html>