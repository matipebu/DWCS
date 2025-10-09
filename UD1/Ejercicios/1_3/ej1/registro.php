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

        <label for="mail">Email</label>
        <input type="mail" id="mail"><br>

        <label for="nom">Nombre</label>
        <input type="text" id="nom"><br>

        <label for="ap1">Primer Apellido</label>
        <input type="text" id="ap1"><br>

        <label for="ap2">Segundo Apellido</label>
        <input type="text" id="ap2"><br>

        <label for="pass">Contraseña</label>
        <input type="password" id="pass"><br>
        
        <label for="pass2">Repite Contraseña</label>
        <input type="password" id="pass2"><br>

        <button type="submit">Login</button>

    </form>

    <?php
    include_once "usuarios_db.php";

        $nombre = $_POST['nombre'] ?? '';
        $ap1 = $_POST['ape1'] ?? '';
        $ap2 = $_POST['ape2'] ?? '';
        $nic = $_POST['nic'] ?? '';
        $mail = $_POST['mail'] ?? '';
        $pass = $_POST['pass'] ?? '';
        $pass2 = $_POST['pass2'] ?? '';
        
        if ($_SERVER['REQUEST_METHOD']=='POST'){
            if($_GET['pass'] == $_GET['pass2']){
                $usuario = addUser($_GET['nic'], $_GET['nom'], $_GET['ap1'], $_GET['ap2'], $_GET['mail'], $_GET['pass']);
                
            }else{
                echo "Las contraseñas no son iguales"; 
            }
        }
    ?>
</body>
</html>