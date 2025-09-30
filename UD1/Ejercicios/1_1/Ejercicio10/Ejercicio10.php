<?php
    function generarNumeros(int $nivel){
            $numeros=[];
            for($i = 0; $i < $nivel; $i++){
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

    $numsIn = $_POST['in_nums']??[];
    $nums = $_POST['nums']??[];
    $nivel = $_POST['nivel']??0;

     $jugando = (comprobarNumeros($numsIn,$nums));
       


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMON DICE</title>
    <style>
        .hidden{
            display: none;
        }
    </style>
    <script>
        function ocultarNumero(){
            setTimeout(
                function(){
                    document.getElementById('numeros').classList.add('hidden');
                    document.getElementById('formulario').classList.remove('hidden');
                 
                }
                ,3000
            );
        }
    </script>

</head>
<body onload="ocultarNumero()">
    <h1>Simon Dice</h1>
    <?php if ($jugando): ?>
    <div id="numeros">
        <h2>Memoriza los numeros</h2>
        <?php
            $nivel++;
            $nums = generarNumeros($nivel);
            echo implode("-",$nums);
        ?>
    
    </div>
    <div id="formulario" class="hidden">
        <form action="" method="post">
            <label for="in_nums">Números </label><br>
            <?php
                for($i=0;$i<$nivel;$i++){
                    echo '<input type="text" name="in_nums[]"<br>';
                }
            
            ?>
            <input type="text" name="nums[]" value="<?php echo implode (".",$nums)?>"></input><br>
            <input type="text" name="nivel" value="<?php echo $nivel;?>">
            <button type="submit">Comprobar</button>
        </form>
    </div>
    <?php else:?>
        <div id="resultado">
            <?php
                echo "has fallado <br>Los numeros eran", $nums,"y tu respuesta fue", $numsIn;
            ?>
            
            <?php endif; ?>
        </div>
    
 
    <?php
    $goal = [2,3,4];
    $target = [2,3,4];
    echo"</br>";
    echo 'Los numeros son '.(comprobarNumeros($target, $goal) ? 'Iguales' : 'Diferentes');
    ?>
      
</body>
</html>