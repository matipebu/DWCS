<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Conductores</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 20px auto; }
        .mensaje { padding: 10px; margin-bottom: 20px; border-radius: 5px; }
        .exito { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"] { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #007bff; color: white; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>

    <h1>Alta de Conductor</h1>

    <?php if (isset($data)): ?>
        <?php if ($data): ?>
            <div class="mensaje exito">
                ✅ Registrado correctamente.
            </div>
        <?php else: ?>
            <div class="mensaje error">
                ❌ No registrado (Error o faltan datos).
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <input type="hidden" name="controller" value="ConductorController">
        <input type="hidden" name="action" value="altaConductor">
        
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div class="form-group">
            <label for="apellido1">Primer Apellido:</label>
            <input type="text" name="apellido1" id="apellido1" required>
        </div>

        <div class="form-group">
            <label for="apellido2">Segundo Apellido (Opcional):</label>
            <input type="text" name="apellido2" id="apellido2">
        </div>

        <div class="form-group">
            <label for="licencia">Licencia (DNI):</label>
            <input type="text" name="licencia" id="licencia" required>
        </div>

        <button type="submit">Guardar Conductor</button>
    </form>

</body>
</html>