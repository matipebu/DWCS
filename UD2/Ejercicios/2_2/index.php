<?php

if (!isset($_COOKIE['numero_secreto'])) {
    setcookie('numero_secreto', rand(1, 1000), time() + 3600, '/');
    setcookie('intentos', 0, time() + 3600, '/');
    setcookie('inicio_tiempo', microtime(true), time() + 3600, '/');
    $mensaje = "Se ha generado un número secreto entre 1 y 1000. ¡Adivínalo!";
} else {
    $mensaje = "";
}

$numero_secreto = isset($_COOKIE['numero_secreto']) ? (int)$_COOKIE['numero_secreto'] : null;
$intentos = isset($_COOKIE['intentos']) ? (int)$_COOKIE['intentos'] : 0;
$inicio_tiempo = isset($_COOKIE['inicio_tiempo']) ? (float)$_COOKIE['inicio_tiempo'] : microtime(true);
$fin = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $num = intval($_POST["num"] ?? 0);

    if($numero_secreto == $num){
        $mensaje = "Has acertado el numero!";
        $intentos++;
    }elseif ($numero_secreto>$num) {
        $mensaje = "El numero es mayor!";
        $intentos++;
    }else{
        $mensaje = "El numero es menor!";
        $intentos++;
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número Secreto</title>
</head>
<body>
    <form action="" method="post">
        <label for="num">Inserta el número secreto</label>
        <button id="num">Enviar</button>
    </form>
    
</body>
</html>