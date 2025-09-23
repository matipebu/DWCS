<?php
    function generarNumeros(int $nivel){
            $numeros=[];
            for($i = 0; $i < nivel; $i++){
                $numeros[]=rand(1,4);
            }
            return $numeros;
    }

    function comprobarNumeros($target,$goal){
        if ($target==$goal){
            return true;
        }else{
            return false;
        }
        

    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMON DICE</title>

</head>
<body>
    <form>
        <label for="numero">Ingresa un número: </label>
        <input type="text" id="numero" name="numero" required>
        <button type="submit">Comprobar</button>
    </form>
    <?php
    $goal = [2,3,4];
    $target = [2,3,4];
    echo"</br>";
    echo 'Los numeros son '.(comprobarNumeros($target, $goal) ? 'Iguales' : 'Diferentes');
    
    ?>
      
</body>
</html>