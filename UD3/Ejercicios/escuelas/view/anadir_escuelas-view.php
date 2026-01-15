<?php
$municipios = $data['municipios'] ?? [];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddEscuela</title>
</head>
<body>
    <form action="controller=EscuelaController&action=addEscuela" method="POST">
        <label for="nom">Nombre</label>
        <input type="text" id="nombre" placeholder="IES Cotarelo Valledor"/>

        <label for="dir">Direccion</label>
        <input type="text" id="dir" placeholder="Calle vilaxoan Nº 4"/>
        
        <label for="nom">Municipio</label>
        <select>
           <?php foreach($municipios as $m) :?>
            <option value="<?= $m->getCodMunicipio(); ?>" <?= isset($_POST['cod_municipio']) && $_POST['cod_municipio'] == $m->getCodMunicipio() ? 'selected' : '' ?>>
                        <?= htmlspecialchars($m->getNombre()); ?>
            </option>
            <?php endforeach;?>
        </select>

        <label for="aper">Hora de apertura</label>
        <input type="datetime" id="aper"/>

        <label for="close">Hora de cierre</label>
        <input type="datetime" id="close"/>

        <label for="com">Comedor</label>
        <select>
            <option value="true">SI</option>
            <option value="false">NO</option>
        </select>
        
        
        <button type="submit">Añadir</button>

        
    </form>
    
</body>
</html>