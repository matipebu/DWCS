<?php
$clientes = $data['clientes']
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listar Clientes</title>
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

    <h1>Lista Clientes</h1>

    <form action='?controller=ClienteController&action=listarProductos' method="POST">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Mail</th>
            </tr>
        </thead>

        <tbody>
            <?php if (count($clientes) === 0): ?>
                <tr>
                    <td colspan="5">No hay Clientes.</td>
                </tr>
            <?php endif ?>

                <?php foreach ($clientes as $e): ?>
                    <tr>
                        <td><?= htmlspecialchars($e->getNombre()); ?></td>

                        <td>
                            <?= htmlspecialchars($e->getApellidos());?>
                        </td>

                        <td><?= $e->getTelefono(); ?></td>

                        <td><?= $e->getMail(); ?></td>
                    </tr>
                <?php endforeach; ?>

        </tbody>
    </table>
</body>

</html>