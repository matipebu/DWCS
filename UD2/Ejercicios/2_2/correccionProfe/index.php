<?php
require_once "controller.php";

if(!jugando()){
    iniciarJuego();
}else{
    $num = $_POST['num'] ?? null;
    if(!isset($num)){
        $error = "Falta el número.";
    }else{
        if(!filter_var($num,FILTER_VALIDATE_INT,['options'=>["max_range"=>1000,"min_range"=>1]])){
            $error = "el numero tiene que ser entre 1 y 1000";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adivina Numero</title>
</head>
<body>
    <h1>Dime un numero entre 1 y 1000</h1>
    <form action="" method="post">
        <label for="num">Número</label><br>
        <input type="number" name="num"><br>
         <?php
            if(isset($error)){
                echo $error, "<br>";

            
            }
        ?>
        <button type="submit">Comprobar</button>
    </form>

    <div id="resultado"></div>
    <?php
    if(!isset($error)){
        if(comprobarNumero($num)==0){
            echo "Enhorabuena, has acertado el numero era $num y necesitaste". getIntentos()."intentos";
            finalizarJuego();
            echo "<a href=''>Volver a empezar</a>";
        }else{
            $msg = $dif>0?"inferior":"mayor";
            echo "El numero es $msg, llevas".getIntentos()."intentos";
        }

    }
    ?>
    
</body>
</html>