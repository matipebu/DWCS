<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>login</h1>
    <form>
        <label for="nic">Nickname</label>
        <input type="text" id="nic"><br>

        <label for="pass">Contraseña</label>
        <input type="password" id="pass"><br>

        <button type="submit">Login</button>

    </form>

    <?php
        include_once "usuarios_db.php";
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            $usuario = getUsuario($_GET['nic']);
            if($usuario){
                $loged = password_verify($_POST['pass'],$usuario['contraseña']);
            }

            if (!isset($loged)&& !$loged){
                echo "No se ha podido logear";
            }else{
                echo $usuario['nombre'].$usuario['ap1']."ha sido autentificado";
            }
        }
    ?>
</body>
</html>