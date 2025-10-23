<?php
require_once "funciones.php";
session_start();
$nic = $_POST['nic'];
$pass = $_POST['pass'];
    

if(isset($_POST['rec'])){
    setcookie('nic',$nic,time()+2592000);

}

if($_SERVER['REQUEST_METHOD']=='POST'){
   
    if(comprobar_usuario($nic,$pass)){
        $_SESSION['nic'] = $nic;
        header("Location: restringido.php");
        exit();
    }else{
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
            <input type="text" name="nic"><br>
            <label for="pass">Contraseña</label><br>
            <input type="password" name="pass"><br>
            <button type="submit">Acceder</button><br>
            <input type="checkbox" name="rec" id="rec">Recordar</input>
        </form>
    </fieldset>
    <a href="registro.php">Registrar usuario</a>
    
</body>
</html>