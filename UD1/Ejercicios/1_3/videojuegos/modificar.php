<?php
include_once ("acceso_datos.php");
if (isset($_GET['id'])) {
    $v = getVideojuego((int)$_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $videojuego_modificado = new Videojuego();
    $videojuego_modificado->setId((int)$_GET['id'])
                          ->setNombre($_POST['nombre'])
                          ->setPlataforma($_POST['plataforma'])
                          ->setGenero($_POST['genero'])
                          ->setLanzamiento($_POST['lanzamiento']);

    $m = updateVideojuego($videojuego_modificado)
        ? "El videojuego ha sido modificado"
        : "El videojuego no se ha podido modificar";

    echo '<script>alert("'.$m.'"); window.location.href="modificar.php?id='.$v->getId().'";</script>';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar</title>
</head>
<body>
  <h2>Modificar Videojuego</h2>
  <form action="modificar.php?id=<?php echo $v->getId(); ?>" method="POST">
    
    <label for="nombre">Nombre:</label><br>
    <input type="text" id="nombre" name="nombre" value="<?php echo $v->getNombre(); ?>" required><br><br>

    <label for="plataforma">Plataforma:</label><br>
    <input type="text" id="plataforma" name="plataforma" value="<?php echo $v->getPlataforma(); ?>" required><br><br>

    <label for="genero">Género:</label><br>
    <input type="text" id="genero" name="genero" value="<?php echo $v->getGenero(); ?>" ><br><br>

    <label for="lanzamiento">Lanzamiento:</label><br>
    <input type="text" id="lanzamiento" name="lanzamiento" value="<?php echo $v->getLanzamiento(); ?>" required><br><br>

    <input type="submit" value="Guardar cambios">
    <a href="listar.php">Volver</a>
  </form>
</body>
</html>
