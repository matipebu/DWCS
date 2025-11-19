<?php
session_start();
include_once "funciones.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['mail'];
    $contraseña = $_POST['pass'];

    $usuario = loguearUsuario($email,$contrasena);
    if ($usuario){
        $_SESSION['usuario'] = $usuario;
        if ($_POST['recordar']){
            if(!isset($_COOKIE['recNombre'])){
                setcookie('recNombre',$usuario['correo'],time()+ 7*24*3600);
            }else{
                setcookie('recNombre', '', time() - 3600);
    
            }
        }
            // Redirigir a dashboard
            header('Location: dashboard.php');
            exit;
    }else{
        $error = "Usuario o contraseña incorrecta";
    }
    
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login BookSphere</title>
</head>
<body>
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post" action="">
        <label for="mail">Email</label>
        <input type="text" name="mail" value="<?= $_COOKIE['recNombre'] ?? '' ?>" placeholder="Escribe tu correo"><br><br>

        <label for="pass">Contraseña</label>
        <input type="password" name="pass"><br><br>

        <input type="checkbox" name="recordar" id="recordar">
        <label for="recordar">Recordar email</label><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>