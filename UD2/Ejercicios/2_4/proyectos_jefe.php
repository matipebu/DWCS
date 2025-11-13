<?php
include_once "funciones.php";
include_once "proyecto.php";
include_once "usuario.php";
session_start();
$usuario = $_SESSION['logged'];
$responsables = getResponsables();

if (!isset($_SESSION['logged']) || empty($_SESSION['logged'])||$_SESSION['rol'] !== 'jefe') {
    header("Location: login.php");
    exit();

}


$proyectos = getProyectosByRol($usuario);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProyecto = (int) $_POST['id_proyecto'];
    $idResponsable = (int) $_POST['responsable'];

    if (actualizarResponsableProyecto($idProyecto, $idResponsable)) {
        echo '<p style="color:green;">Responsable actualizado </p>';
        $proyectos = getProyectosByRol($usuario);
    } else {
        echo '<p style="color:red;">Error al actualizar responsable </p>';
    }
}





?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos Jefe</title>
</head>

<body>
    <h2>Proyectos</h2><br>
    <a href="add_proyecto.php">Nuevo</a><br>
   

        <?php
        foreach ($proyectos as $proyecto) {
            $responsableProy = getUsuarioById($proyecto->getIdResponsable());
            echo ' <article style="border: 1px solid;" "gap:2px;">';
            echo '<h3>' . $proyecto->getNombre() . '</h3>';
            echo '<p>' . $responsableProy->getNombre() . '</p>';
            echo '<p>' . $proyecto->getDescripcion() . '</p>';
            echo '<label>Responsable</label><br>';


            echo '<form method="post" action="">';
            echo '<select name="responsable" onchange="this.form.submit()">';
            foreach ($responsables as $responsable) {
                $selected = ($responsable->getId() == $proyecto->getIdResponsable()) ? 'selected' : '';
                echo '<option value="' . $responsable->getId() . '" ' . $selected . '>' . $responsable->getNombre() . '</option>';
            }

            echo '</select>';
            echo '<input type="hidden" name="id_proyecto" value="' . $proyecto->getId() . '">';
            echo '</form>';
            echo '</article>';

        }

        ?>



</body>

</html>