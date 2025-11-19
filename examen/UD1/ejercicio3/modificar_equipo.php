<?php

include_once "conexionBD.php";

$id_equipo = $_REQUEST['id_equipo']??null;
$equipo = getEquipo($id_equipo);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $mail= $_POST['email'] ?? null;
    $puntuacion= $_POST['puntuacion'] ?? null;
    $integrantes= $_POST['integrantes'] ?? null;

    $errores= [];
    if(!isset($mail)||empty($mail)){
        $errores[] = "Falta el email";
    }else{
        $email=filter_var($email,FILTER_VALIDATE_EMAIL);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errores[] = "email no válido";
        }
    }

    if(!isset($integrantes)||empty($integrantes)){
        $errores[] = "Falta el n.o integrante";
    }else{
        if(!filter_var($integrantes,FILTER_VALIDATE_INT,['options'=>["min_range"=>2,"max_range"=>5]])){
            $errores[] = "El numero de integrantes debe ser un entero entre 2 y 5";
        }
    }

    if(!isset($puntuacion)||empty($puntuacion)){
        $errores[] = "Falta el n.o integrante";
    }else{
        if(!filter_var($puntuacion,FILTER_VALIDATE_FLOAT,['options'=>["min_range"=>0,"max_range"=>100]])){
            $errores[] = "El numero de integrantes debe ser un entero entre 0 y 100";
        }
    }

    if(count($errores)==0){
        $equipo = new Equipo();
        $equipo->id_equipo = $id_equipo;
        $equipo->email = $email;
        $equipo->num_integrantes = $integrantes;
        $equipo->puntuacion = $puntuacion;
        if(!updateEquipo($equipo)){
            $errores=["Se ha producido un error actualizando el equipo."];
        }


    }   
}


?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/css/modificar_equipo.css">
    <title>Modificar equipo</title>
</head>

<body>
    <h1>Actualizar datos de equipo</h1>
    <fieldset>
        <!-- El nombre del equipo debe ser dinámico -->
        <legend><?=$equipo->nombre?></legend>
        <form action="?id_equipo=<?=$equipo->id_equipo?>" method="post">
            <!-- Los valores de los inpunts deben corresponderse con los valores actuales que deben obtenerse dinámicamente -->
            <label for="email">Correo de contacto</label>
            <input type="text" name="email" value="<?=$equipo->email?>">
            <label for="num_integrantes">Nº Integrantes</label>
            <input type="text" name="num_integrantes" class="input_pequeno" value="<?=$equipo->num_integrantes?>">
            <label for="puntuacion">Puntuación</label>
            <input type="text" name="puntuacion" class="input_pequeno" value="<?=$equipo->puntuacion?>">
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="listar_equipos.php" class="btn btn-cancel">Cancelar</a>
            </div>
        </form>
        <?php
            if (isset($errores)){
                echo "<ul>";

                echo "</ul>";
            }
        
        ?>
    </fieldset>
</body>