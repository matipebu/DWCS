<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Coches</title>
    </head>
<body>

    <h1>Listado de Coches</h1>

    <form action="index.php" method="GET">
        <input type="hidden" name="controller" value="CocheController">
        <input type="hidden" name="action" value="listarCoches">

        <label for="color">Filtrar por Color:</label>
        <input type="text" name="color" id="color" 
               value="<?php echo isset($_REQUEST['color']) ? htmlspecialchars($_REQUEST['color']) : ''; ?>">
        
        <button type="submit">Buscar</button>
        
        <?php if(!empty($_REQUEST['color'])): ?>
            <a href="index.php?controller=CocheController&action=listarCoches">Ver todos</a>
        <?php endif; ?>
    </form>

    <?php if (isset($data) && !empty($data)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $coche): ?>
                    <tr>
                        <td><?= $coche->getMatricula() ?></td> 
                        <td><?= $coche->getMarca() ?></td>
                        <td><?= $coche->getModelo() ?></td>
                        <td><?= $coche->getColor() ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron coches.</p>
    <?php endif; ?>

</body>
</html>