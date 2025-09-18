<?php include_once "functions.php"; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getting started PHP</title>
</head>
<body>
    <h1>Ejercicio 1</h1>
   <?php
    $precio = 30.5;
    echo "El IVA de $precio es ",calcularIva($precio, 10);

   ?>

   <h1>Ejercicio 2</h1>
   <?php
    $usr = "admin";
    $pass = "1234";
    echo "El login para $usr y $pass es ",login($usr, $pass)?"correcto":"incorrecto";
   ?>

   <h1>Ejercicio 3</h1>
   <?php
    $numeros = "3,4,5,7,89,2";
    // echo "Ejemplo explode $numeros";
    $numeros = explode(",",$numeros);
    sumatorio($numeros);
   ?>
   <h1>Ejercicio 4</h1>
   <?php
    $radio = 3;
    $altura = 6.23;
    echo "Cilindro de r = $radio y h=$altura =", volumenCilindro($radio, $altura);
   ?>

    <h1>Ejercicio 5</h1>
   <?php
    $numero = "3355";
    echo "Inverso de $numero =", inversor($numero);
   ?>


   
</body>
</html>