<?php
include_once "funciones.php";
session_start();
if(isset($_SESSION['usuario'])){
    header("login.php");
    exit;
}
$libros  = getLibros();


$destacados = $_POST['destacados'] ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    setcookie('librosDestacados',$destacados,time()+3600);
    

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
            echo "<label for='dest'></label>";
            echo "<input type='checkbox' name='destacados[]' value='".$libro['id']."' ";


            
            echo "/>";

        }
        ?>

        <?php
            echo '<h3>Asignar nivel de lectura</h3>';

            foreach ($libros as $libro) {

                echo '<label>' . $libro['titulo'] . ':</label>';

                echo '<select name="nivel[' . $libro['id'] . ']">';

                $nivelActual = "";
                if(isset($niveles[$libro['id']])){
                    $nivelActual = $niveles[$libro['id']];
                }

                $opciones = ['Principiante','Intermedio','Avanzado'];

                foreach($opciones as $o){
                    $selected = ($nivelActual == $o) ? 'selected' : '';
                    echo '<option value="' . $o . '" ' . $selected . '>' . $o . '</option>';
                }

                echo '</select><br>';
            }

            echo '<br><button type="submit">Guardar cambios</button>';
        
        ?>
    </form>

    <br><a href="logout.php">Cerrar sesión</a>
</body>
</html>
