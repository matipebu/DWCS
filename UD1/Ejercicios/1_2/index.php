<?php
include_once "ej3.php";



$persona = new Persona("Juan", 20);

// Probar métodos
$nombre = $persona->getNombre();
$edad = $persona->getEdad();
$mayor = $persona->esMayorDeEdad() ? "Sí, es mayor de edad" : "No, es menor de edad";

// Cambiamos la edad
$persona->setEdad(15);
$nuevaEdad = $persona->getEdad();
$nuevoMayor = $persona->esMayorDeEdad() ? "Sí, es mayor de edad" : "No, es menor de edad";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba Clase Persona</title>
</head>
<body>
    <h1>Prueba de la clase Persona</h1>
    <p>Se creó una persona llamada <strong><?php echo $nombre; ?></strong> con <?php echo $edad; ?> años.</p>
    <p><?php echo $mayor; ?></p>

    <p>Después de cambiar la edad a <?php echo $nuevaEdad; ?> años:</p>
    <p><?php echo $nuevoMayor; ?></p>
</body>
</html>