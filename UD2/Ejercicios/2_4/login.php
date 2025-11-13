<?php
include_once "funciones.php";
include_once "usuario.php";
session_start();

if (isset($_SESSION['logged']) && isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 'jefe':
            header("Location: proyectos_jefe.php");
            exit;
        case 'responsable':
            header("Location: proyectos_responsable.php");
            exit;
        case 'programador':
            header("Location: proyectos_programador.php");
            exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['correo']) && isset($_POST['contrasena']) && !empty($_POST['correo']) && !empty($_POST['contrasena'])) {

        $comprobarUsuario = comprobar_usuario($_POST['correo'], $_POST['contrasena']);

        if ($comprobarUsuario) {
            $usuario = new Usuario($comprobarUsuario['nombre'],$comprobarUsuario['correo'],$comprobarUsuario['contrasena'],$comprobarUsuario['id']);
            $idUsuario = $usuario->getId();
            $rolUsuario = getRolById($idUsuario);
            
            
            

            // Guardar datos de sesión
            $_SESSION['logged'] = $usuario;
            $_SESSION['rol'] = strtolower($rolUsuario);

            // Cookie segura
            $sesParams = session_get_cookie_params();
            setcookie(
                session_name(),
                session_id(),
                $sesParams['lifetime'],
                $sesParams['path'],
                $sesParams['domain'],
                $sesParams['secure'],
                true
            );
            switch ($_SESSION['rol']) {
                case 'jefe':
                    header("Location: proyectos_jefe.php");
                    exit;
                case 'responsable':
                    header("Location: proyectos_responsable.php");
                    exit;
                case 'programador':
                    header("Location: proyectos_programador.php");
                    exit;
            }

        } else {
            $error = "Login incorrecto";
        }
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
    <form action="" method="post">
        <label for="correo">Correo</label>
        <input type="text" name="correo" placeholder="Escribe tu correo aquí"><br>

        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" placeholder="Escribe tu contraseña"><br>

        <button type="submit">Acceder</button><br>

    </form>
    <a href="registro.php">Registrar usuario</a>

</body>

</html>