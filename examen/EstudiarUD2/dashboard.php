<?php
include_once "funciones.php";
session_start();

if(!isset($_SESSION['usuario'])){
    die("No has iniciado sesión.");
}

$usuario = $_SESSION['usuario'];
$rol = $usuario['rol_id'] == 1 ? 'admin' : 'cliente';

$libros = getLibros();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $rol == 'admin') {
    $librosDestacados = $_POST['destacados'] ?? [];
    $_SESSION['destacados'] = $librosDestacados;

    $nivelesLectura = $_POST['nivel'] ?? [];
    $_SESSION['niveles'] = $nivelesLectura;

    echo "<p style='color:green;'>Cambios guardados correctamente.</p>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Libros</title>
</head>
<body>
    <h1>Dashboard Libros</h1>
    <p>Bienvenido, <?= $usuario['nombre'] ?> (<?= $rol ?>)</p>

    <form method="post">
        <h3>Marcar libros destacados</h3>
        <?php
        foreach ($libros as $libro) {
            echo '<label>';
            if($rol == 'admin'){
                echo '<input type="checkbox" name="destacados[]" value="' . $libro['id'] . '"';
                // Revisar sesión de manera directa como en tus ejercicios
                if(isset($_SESSION['destacados'])){
                    foreach($_SESSION['destacados'] as $d){
                        if($d == $libro['id']){
                            echo ' checked';
                        }
                    }
                }
                echo '>';
                echo $libro['titulo'] . ' - ' . $libro['autor'];
            } else {
                if(isset($_SESSION['destacados'])){
                    foreach($_SESSION['destacados'] as $d){
                        if($d == $libro['id']){
                            echo $libro['titulo'] . ' - ' . $libro['autor'];
                        }
                    }
                }
            }
            echo '</label><br>';
        }
        ?>

        <?php
        if($rol == 'admin'){
            echo '<h3>Asignar nivel de lectura</h3>';
            foreach ($libros as $libro) {
                echo '<label>' . $libro['titulo'] . ':</label>';
                echo '<select name="nivel[' . $libro['id'] . ']">';
                $niv = '';
                if(isset($_SESSION['niveles'][$libro['id']])){
                    $niv = $_SESSION['niveles'][$libro['id']];
                }
                $opciones = ['Principiante','Intermedio','Avanzado'];
                foreach($opciones as $o){
                    $selected = ($niv == $o) ? 'selected' : '';
                    echo '<option value="' . $o . '" ' . $selected . '>' . $o . '</option>';
                }
                echo '</select><br>';
            }
            echo '<br><button type="submit">Guardar cambios</button>';
        }
        ?>
    </form>

    <br><a href="logout.php">Cerrar sesión</a>
</body>
</html>
