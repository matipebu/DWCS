<?php
include_once "funciones.php";
include_once "proyecto.php";

$responsables = getResponsables();

$nombre = $_POST['nombre'];
$responsable = $_POST['resp'];
$descripcion = $_POST['descripcion'];
$msg = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($nombre) && isset($responsable) && isset($descripcion)){
        $proyecto = new Proyecto($nombre,$descripcion,$responsable);
        if(addProyecto($proyecto)){
            $msg = "Proyecto creado";
        }else{
            $msg = "Fallo al crear proyecto";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Proyecto</title>
</head>
<body>
    <h2>Nuevo Proyecto</h2>
    <h2><?=$msg?></h2>
     <form action="" method="post">
        <label for="nombre">Proyecto</label>
        <input type="text" name="nombre" placeholder="Escribe el nombre del proyecto"><br>
        <label for="resp">Responsable:</label><br>
            <select name="resp" required>
                <option value="">Selecciona un rol</option>
                <?php
                foreach ($responsables as $r) {
                    echo "<option value='" . $r->getId(). "'>" . $r->getNombre(). "</option>";
                }
                ?>
            </select><br>

        <label for="descripcion">Descripción</label><br>
        <textarea name="descripcion"></textarea><br>

        <button type="submit">Crear</button><br>

    </form>
    <a href="proyectos_jefe.php">Cancelar</a>
    
</body>
</html>