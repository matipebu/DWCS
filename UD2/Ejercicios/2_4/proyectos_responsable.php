<?php 
include_once "funciones.php";
session_start();

if (!isset($_SESSION['logged']) || !isset($_SESSION['rol'])) {
    header("Location: login.php");
    exit;
}





?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos proyectos_programador</title>
</head>
<body>
    
</body>
</html>