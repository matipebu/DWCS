<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Producto</title>
    <style>
        /* Mantenemos tus estilos originales */
        body { font-family: sans-serif; margin: 20px; }
        
        fieldset {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #aaa;
            max-width: 400px; /* Limitamos el ancho para que se vea mejor */
        }

        legend {
            font-weight: bold;
        }

        .campo {
            margin-bottom: 15px;
        }

        label {
            display: block; /* Para que el label esté encima del input */
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 6px;
            box-sizing: border-box; /* Para que el padding no desborde el ancho */
        }

        button {
            padding: 8px 15px;
            cursor: pointer;
            background-color: #eee;
            border: 1px solid #aaa;
        }

        button:hover {
            background-color: #ddd;
        }

        .enlace-volver {
            margin-top: 15px;
            display: inline-block;
            text-decoration: none;
            color: #333;
            font-size: 0.9em;
        }
    </style>
</head>

<body>

    <h1>Añadir Nuevo Producto</h1>

    <form action="?controller=ProductoController&action=anadirProducto" method="POST">
        <fieldset>
            <legend>Información del Producto</legend>

            <div class="campo">
                <label for="denominacion">Denominación:</label>
                <input type="text" id="denominacion" name="denominacion" required>
            </div>

            <div class="campo">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" rows="3"></textarea>
            </div>

            <div class="campo">
                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" min="0" required>
            </div>

            <div class="campo">
                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" min="0" required>
            </div>

            <button type="submit">Guardar Producto</button>
        </fieldset>
    </form>

    <a href="?controller=ProductoController&action=listarProductos" class="enlace-volver">
        ← Volver al listado
    </a>

</body>

</html>