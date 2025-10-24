<?php
require_once "funciones.php";

//Parametros para seguridad de la session
session_set_cookie_params([
    'lifetime' => 0,
    'path' => '/',
    'domain' => '',
    'secure' => false, 
    'httponly' => true,
    'samesite' => 'Strict'
]);

session_start();

$nic = $_POST['nic'];
$pass = $_POST['pass'];

//Reiniciar sesion cada 10 min
if (!isset($_COOKIE['reiniciar'])) {
    setcookie('reiniciar', time());
    session_regenerate_id(true);

} elseif (time() - $_COOKIE['reiniciar'] >= 600) {
    setcookie('reiniciar', time());
    session_regenerate_id(true);
}



   if (isset($_SESSION['nic'])) {
            header("Location: restringido.php");
            exit();
        }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (comprobar_usuario($nic, $pass)) {
        if (isset($_POST['rec'])) {
            setcookie('nic', $nic, time() + 2592000);

        }

        $_SESSION['nic'] = $nic;
        header("Location: restringido.php");
        exit();

    } else {
        echo "Tienes que registrarte primero";

    }

}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <fieldset>
        <form action="" method="post">
            <label for="nic">Nombre de usuario (nic)</label><br>
            <input type="text" name="nic" value="<?= $_COOKIE['nic'] ?>"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass"><br>
            <button type="submit">Acceder</button><br>
            <input type="checkbox" name="rec" id="rec">Recordar</input>
        </form>
    </fieldset>
    <a href="registro.php">Registrar usuario</a>

</body>

</html>