<?php
session_start();

if (!isset($_SESSION['nic'])) {
    header("Location: login.php");
    exit();
}
if (isset($_GET['logout'])) {
    unset($_SESSION['nic']);
    session_unset();
    $cookie_params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 3600,
        $cookie_params['path'],
        $cookie_params['domain'],
        $cookie_params['secure'],
        $cookie_params['httponly']
    );
    //Cerramos la sesion
    session_destroy();

    header("Location: login.php");
    exit();
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección restringida</title>
</head>

<body>
    <h1>Sección restringida</h1>
    Estás logueado con el usuario <?= $_SESSION['nic'] ?>. Pulsa aquí para salir: <a href="?logout">Logout</a>
    <p>
        Esta sección esta restringida solo para los usuarios que están registrados.
    </p>
</body>

</html>