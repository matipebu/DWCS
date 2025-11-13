<?php
include_once "funciones.php";
session_start();
$roles = obtenerRoles();

$correo = $_POST['correo'] ?? null;
$nombre = $_POST['nombre'] ?? null;
$rol = $_POST['rol'] ?? null;
$contrasena = $_POST['contrasena'] ?? null;
$contrasena2 = $_POST['contrasena2'] ?? null;



if (isset($correo) && isset($nombre) && isset($rol) && isset($contrasena) && isset($contrasena2)) {
    $errores = [];
    if ($contrasena !== $contrasena2) {
        $errores[] = 'Las contraseñas no coinciden';
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El formato del email no es correcto';

    }

    if (empty($errores)) {
        $u = new Usuario(nombre:$nombre, correo:$correo, contrasena: $contrasena);
        if (altaUsuario($u,$rol)) {
            $msg = 'Usuario creado';
        } else {
            $msg = 'No se ha podido crear el usuario';
        }

    } else {
        
        $msg = implode('<br>', $errores);
    }

}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
</head>
<body>
    <h2>Registrar Usuario</h2>

    <form action="" method="post">
        <p>
            <label for="correo">Correo:</label><br>
            <input type="text" name="correo" placeholder="Escribe tu correo aquí">
        </p>

        <p>
            <label for="nombre">Nombre:</label><br>
            <input type="text" name="nombre" placeholder="Escribe tu nombre">
        </p>

        <p>
            <label for="rol">Rol:</label><br>
            <select name="rol" required>
                <option value="">Selecciona un rol</option>
                <?php
                foreach ($roles as $r) {
                    echo "<option value='" . $r['id'] . "'>" . $r['nombre']. "</option>";
                }
                ?>
            </select>
        </p>

        <p>
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" name="contrasena" placeholder="Escribe tu contraseña">
        </p>

        <p>
            <label for="contrasena2">Repite Contraseña:</label><br>
            <input type="password" name="contrasena2" placeholder="Repite tu contraseña">
        </p>

        <p>
            <button type="submit">Registrar usuario</button>
        </p>
    </form>
            <a href="login.php">Ir a Login</a>


    <?php
    if (isset($msg)) {
        echo "<p>" . $msg . "</p>";
    }
    ?>
</body>
</html>
