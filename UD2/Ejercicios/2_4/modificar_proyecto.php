<?php
include_once "funciones.php";

if (!isset($_REQUEST["id"])) {
    die("No se ha especificado el proyecto.");
}

$idProyecto = (int) $_REQUEST["id"];
$proyecto = getProyectoById($idProyecto);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $programadoresSeleccionados = $_POST['programadores'] ?? [];
    actualizarProgramadoresProyecto($idProyecto, $programadoresSeleccionados);
    echo "<p style='color:green;'> Cambios guardados correctamente.</p>";
}


$proyecto = getProyectoById($idProyecto);
$programadores = getProgramadoresProyecto($idProyecto);
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

    <form method="post" >
        <input type="hidden" name="id_proyecto" value="<?= $idProyecto; ?>">

        <label for="desc">Descripción:</label>
        <input type="text" name="desc" value="<?=$proyecto->getDescripcion(); ?>"><br><br>

        <h3>Asignar programadores:</h3>
        <?php
        foreach ($programadores as $prog) {
            echo '<label>';
            echo '<input type="checkbox" name="programadores[]" value="' . $prog['id'] . '"';
            if ($prog['asignado']) {
                echo ' checked';
            }
            echo '>';
            echo $prog['nombre'] . ' (' . $prog['correo'] . ')';
            echo '</label><br>';
        }
        ?>

        <br>
        <button type="submit">Guardar cambios</button>
    </form>
</body>

</html>