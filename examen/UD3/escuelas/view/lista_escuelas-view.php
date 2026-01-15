<?php

$escuelas = $data['escuelas'] ?? [];
$municipios = $data['municipios'] ?? [];
$provincias = $data['provincias'] ?? [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Escuelas</title>
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
    <h1>Listado de escuelas</h1>
    <form action='?controller=EscuelaController&action=listarEscuelas' method="POST">
        <fieldset>
            <legend>Filtros</legend>
            <label for="name">Nombre: </label>
            <input type="text" name="nombre" id="name" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">

            <label for="pro">Provincia: </label>
            <select name="cod_provincia" id="pro">
                <option value="">-- Todos --</option>
                <?php foreach ($provincias as $p): ?>
                    <option value="<?= $p->getCodProvincia(); ?>" <?= isset($_POST['cod_provincia']) && $_POST['cod_provincia'] == $p->getCodProvincia() ? 'selected' : '' ?>>
                        <?= htmlspecialchars($p->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            
            <?php
            $nombreMun =  [];
            foreach ($municipios as $m) {
                $nombreMun[$m->getCodMunicipio()]=$m->getNombre();
            }
            ?>
            <label for="mun">Municipio: </label>
            <select name="cod_municipio" id="mun">
                <option value="">-- Todos --</option>
                <?php foreach ($municipios as $m): ?>
                    <option value="<?= $m->getCodMunicipio(); ?>" <?= isset($_POST['cod_municipio']) && $_POST['cod_municipio'] == $m->getCodMunicipio() ? 'selected' : '' ?>>
                        <?= htmlspecialchars($m->getNombre()); ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Filtrar</button>
        </fieldset>
    </form>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Municipio</th>
                <th>Comedor</th>
                <th>Hora Apertura</th>
                <th>Hora Cierre</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($escuelas) == 0): ?>
                <tr>
                    <td colspan="5">No hay escuelas con esos Filtros</td>
                </tr>
            <?php else: ?>
                <?php foreach ($escuelas as $e): ?>
                    <tr>
                        <td><?= htmlspecialchars($e->getNombre()) ?></td>
                        <td><?= $nombreMun[$e->getCodMunicipio()] ?? 'Desconocido' ?></td>
                        <td><?= $e->getComedor() ? 'SI' : 'NO' ?></td>

                        <td><?= $e->getHoraApertura() ? $e->getHoraApertura()->format('H:i') : 'N/A' ?></td>
                        <td><?= $e->getHoraCierre() ? $e->getHoraCierre()->format('H:i') : 'N/A' ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>