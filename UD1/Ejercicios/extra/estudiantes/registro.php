<?php
include_once "Estudiante.php";
include_once "conexion.php"; // o bd_estudiantes.php, según el nombre que tengas

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $ap1 = trim($_POST["ap1"] ?? "");
    $ap2 = trim($_POST["ap2"] ?? "");
    $edad = intval($_POST["edad"] ?? 0);
    $correo = trim($_POST["email"] ?? "");
    $pass = $_POST["pass"] ?? "";
    $pass2 = $_POST["pass2"] ?? "";

    if (empty($nombre) || empty($ap1) || empty($edad) || empty($correo) || empty($pass)) {
        $mensaje = "Todos los campos obligatorios deben estar completos.";
    } elseif ($pass !== $pass2) {
        $mensaje = "Las contraseñas no coinciden.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "El correo no tiene un formato válido.";
    } else {
        $nuevoEstudiante = new Estudiante($a,$a);

        if (registroEstudiante($nuevoEstudiante)) {
            $mensaje = "Estudiante registrado correctamente.";
        } else {
            $mensaje = "Error al registrar el estudiante.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Estudiantes</title>
</head>
<body>
    <h1>Registro de Estudiantes</h1>


    <form action="" method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="ap1">Primer apellido:</label><br>
        <input type="text" id="ap1" name="ap1" required><br><br>

        <label for="ap2">Segundo apellido:</label><br>
        <input type="text" id="ap2" name="ap2"><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" min="0" max="120" required><br><br>

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="pass">Contraseña:</label><br>
        <input type="password" id="pass" name="pass" required><br><br>

        <label for="pass2">Repite Contraseña:</label><br>
        <input type="password" id="pass2" name="pass2" required><br><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
