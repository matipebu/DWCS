<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Clientes</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        fieldset {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #aaa;
            max-width: 500px;
        }

        legend {
            font-weight: bold;
            padding: 0 10px;
        }

        .form-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            cursor: pointer;
            background-color: #eee;
            border: 1px solid #aaa;
            font-weight: bold;
        }

        button:hover {
            background-color: #ddd;
        }

        .acciones {
            margin-top: 20px;
        }

        .btn-cancelar {
            text-decoration: none;
            color: #666;
            margin-left: 15px;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    <h2>Nuevo Cliente</h2>

    <form action="?controller=ClienteController&action=anadirCliente" method="POST">
        <fieldset>
            <legend>Datos del cliente</legend>

            <label>
                Nombre:
                <input type="text" name="nombre" required>
            </label>

            <br><br>

            <label>
                Apellidos:
                <input type="text" name="apellidos" required>
            </label>

            <br><br>

            <label>
                Teléfono:
                <input type="text" name="telefono" required>
            </label>

            <br><br>

            <label>
                Email:
                <input type="email" name="mail" required>
            </label>

            <br><br>

            <button type="submit">Guardar cliente</button>
        </fieldset>
    </form>

</body>

</html>