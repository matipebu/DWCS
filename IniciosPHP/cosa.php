<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Start</title>
</head>
<body>
    <h1>HTML</h1>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, culpa quidem. Necessitatibus vel voluptas magni, placeat iure facilis quis et blanditiis qui culpa sapiente quisquam perspiciatis, consequuntur, itaque maxime iste?
    <ol>
    <?php

        echo "<h1>Esto es PHP</h1>";
//Variables
        $entero= 5;
        $string_simples= 'simples'; //no permite este tipo de carácteres (escapados, \n)
        $string_dobles = "dobles";
        $boolean = true;


        // var_dump($entero);// para ver el tipo de dato de la variable.
        // var_dump($string_simples);
        // var_dump($string_dobles);
        // var_dump($boolean);



//Operadores con strings
            //Concatenar
            echo "1: ",$resultado;
            var_dump($resultado);

            $resultado = $string_simples.$string_dobles;
            echo "2: ",$resultado;
            var_dump($resultado);
            $resultado .= "final";

            echo "3: ",$resultado;
            var_dump($resultado);
            
            
//Operadores con int (+,-,*,/,%,** potencia (^),++,--,+=,=+,-=,=-)
            $un_entero = 5;
            $otro_entero =3;

            echo "<br>Suma: ";
            echo $un_entero+$otro_entero;

            echo "<br>Potencia: ";
            echo $un_entero**$otro_entero;

            echo "<br>Módulo: ";
            echo $un_entero%$otro_entero;

            echo "<br>Concatenación: ";
            echo $un_entero.$otro_entero;



            $i = 100;
            var_dump($i++);//100
            var_dump($i);//101
            
            $e = 100;
            var_dump(++$e);//101
            var_dump($e);//101

            $e = 100;
            $b = true;
            var_dump($e+$b);//101

            $j = 100;
            $v = false;
            var_dump($j+$v);//100

//Condicionales
            $a = true;
            $b = false;
            $c = $a&&$b;//false
            $d = $a||$b;//true
            $e = !$b;//true

            $c2= $a and $b;//false
            $d2 = $a or $b;
            //$nombre = "Pepe";
            $numero = 6;

            if ($numero) {
                echo "<\br>Entra if";

            } elseif(true){
              
                echo "Entra elseif";
            }else{
                echo "Entra echo";
            }

//Bucles for
        for($i=1; $i<=10; $i++){
            echo"<li> Opción ", $i, "</li>";

        }

//Arrays (clave/valor)
        // $lista = array(
        //     "dos" => 2,
        //     "cinco" => 5,
        //     "verdadero" => true,
        //     "nombre" => "jose",
        // );
        // var_dump($lista);

        // $elemento = $lista;
        // echo "<br>";
        // var_dump($elemento);
        

    $lista1 = array(
        "Pedro"=>10.00,
        "Jose"=>4.65,
        "Marta"=>7.23,

    );

    foreach ($lista1 as $nombre => $nota) {
        echo "<br>", $nombre, " tiene un ",$nota;
    }
            
    echo "Primer next()";
    next($lista1);
    echo next($lista1);
      
    include(functions.php);

    echo "El IVA de 130€ es ", calcularIva(130,20), "€";

    ?>
    
    </ol>


</body>
</html>