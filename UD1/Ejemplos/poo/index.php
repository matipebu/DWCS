<?php
//Importar ficheros de las clase
include_once "miClase.php";
include_once "clasemadre.php";
include_once "clasehija.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO</title>
</head>
<body>
    <h1>Probando mi clase</h1>
    <?php
    $miObjeto = new MiClase();
    echo '$miObjeto->getVar1()<br>';
    echo $miObjeto->getVar1();
    echo '<br>$miObjeto->setVar1("Cambio var1")<br>';
    $miObjeto->setVar1("cambio var1");
    echo '<br>$miObjeto->print()<br>';
    echo $miObjeto->print();

    echo"<br> Fluent interface<br>";
    $miObjeto->setVar1("fluentinterface");
    $miObjeto->setVar2("fluentinterface");

    $miObjeto->setVar1("ffffff")
             ->setVar2();
    
    ?>
    <h1>Herencia</h1>
    <h2>Clase madre(superclase)</h2>
    <?php
        $madre = new ClaseMadre("Lola");
        var_dump($madre);
    ?>
     <h2>Clase hija(subclase)</h2>
    <?php
        $hija = new Clasehija ("Lolita","asdasdasdasd");
        var_dump($hija);
    ?>

    <h1>Clase abstracta</h1>
    <?php
        $miCuadrado = new Cuadrado(5);
        $peri = $miCuadrado->getPerimetro();
        $area = $miCuadrado->getArea();
        
        echo "El perímetro del cuadrado en $peri <br>";
        echo "El área del cuadrado en $area <br>;";
    ?>
    <h1>Método estático</h1>
    <?php
        echo MiClase::saludo();
    
    ?>
    
</body>
</html>