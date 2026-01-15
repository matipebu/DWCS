
<?php
$productos = $data['productos']
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listar Productos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #aaa;
            padding: 8px 10px;
            text-align: left;
        }

        th {
            background: #eee;
        }

        fieldset {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #aaa;
        }

        legend {
            font-weight: bold;
        }

        label {
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 4px;
        }

        select {
            padding: 4px;
        }

        button {
            padding: 6px 12px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>Listar Productos</h1>

    <form action='?controller=ProductoController&action=anadirProducto' method="POST">
    <table>
        <thead>
            <tr>
                <th>Denominacion</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>

        <tbody>
            <?php if (count($productos) === 0): ?>
                <tr>
                    <td colspan="5">No hay productos.</td>
                </tr>
            <?php endif ?>

                <?php foreach ($productos as $e): ?>
                    <tr>
                        <td><?= htmlspecialchars($e->getDenominacion()); ?></td>

                        <td>
                            <?= htmlspecialchars($e->getDescripcion());?>
                        </td>

                        <td><?= $e->getPrecio(); ?></td>

                        <td><?= $e->getCantidad(); ?></td>
                    </tr>
                <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>