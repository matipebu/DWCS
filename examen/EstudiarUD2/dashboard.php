<?php
include_once "funciones.php";
session_start();

if (isset($_GET['logout'])) {
session_unset();
$cookie_params = session_get_cookie_params();
setcookie(
    session_name(),
    '',
    time()-3600,
    $cookie_params['path'],
);
session_destroy();

}
if(!isset($_SESSION['usuario'])){
    header("Location:login.php");
    exit;
}else{

    $usuario = $_SESSION['usuario'];
}

$destacados = [];
if (isset($_COOKIE['librosDestacados']) && $_COOKIE['librosDestacados'] !== '') {
    $destacados = json_decode($_COOKIE['librosDestacados'], true);
}

$niveles = [];
if (isset($_COOKIE['nivelesLectura']) && $_COOKIE['nivelesLectura'] !== '') {
    $niveles = json_decode($_COOKIE['nivelesLectura'], true);
}

$libros  = getLibros();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $destacados = $_POST['destacados'] ?? [];
    setcookie('librosDestacados',json_encode($destacados,true),time()+3600);
    
    $niveles = $_POST['dificultad'] ?? [];
    setcookie('nivelesLectura', json_encode($dificultad), time()+3600);
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
            echo "<label for='dest'>";
            echo $libro['titulo'] ."-". $libro['autor'];
            echo "<input type='checkbox' name='destacados[]' value='".$libro['id']."' ";
            
            foreach ($destacados as $d){
                if($d == $libro['id'])
                    echo "checked";
            }
            echo "><br>";
            echo "</label>";

        }
        ?>
        <h3>Asignar nivel de lectura</h3>
        
        <?php
            foreach ($libros as $libro) {
                echo "<label>".$libro['titulo']."</label>";
                echo "<select name='dificultad[".$libro['id']."]'>";
                $opciones = ["facil", "media", "dificil"];
                foreach ($opciones as $op) {
                    echo "<option value='$op' ";
                    if($niveles[$libro['id']] === $op){
                        echo "selected";
                    }
                    echo ">$op</option>";
                }

                

                echo "</select>";
            }
        echo '<br><button type="submit">Guardar cambios</button>';

        ?>
    </form>

    <br><a href="?logout=1">Cerrar sesión</a>
</body>
</html>


