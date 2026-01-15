<?php 
$municipios = $data['municipios']?? [];
$provincias = $data['provincias']?? [];
$escuelas = $data['escuelas']?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listar Escuelas</title>
</head>
<body>
   <form action='?controller=EscuelaController&action=listarEscuelas' method="POST">
    <fieldset>
        <legend>Filtros</legend>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" value='<?=$_POST['nombre']??''?>'/>

        <label for="pro">Provincia</label>
        <select name="cod_provincia" id="pro">
            <option value="">TODOS</option>
            <?php foreach($provincias as $p): ?>
                <option value="<?=$p->getCodProvincia()?>" <?=isset($_POST['cod_provincia'])&&$_POST['cod_provincia']== $p->getCodProvincia()? 'selected':''?>>
                    <?=$p->getNombre()?></option>
            <?php endforeach; ?>
        </select>


        <label for="mun">Municipio</label>
        <select name="cod_municipio" id="mun">
            <option value="">TODOS</option>
            <?php foreach($municipios as $m): ?>
                <option value="<?=$m->getCodMunicipio();?>" <?=isset($_POST['cod_municipio'])&&$_POST['cod_municipio']== $m->getCodMunicipio()?'selected':''?>>
                    <?=$m->getNombre()?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filtrar</button>
    </fieldset>
    <?php
    $nomMunicipios = [];
    foreach($municipios as $m) {
        $nomMunicipios[$m->getCodMunicipio()]=$m->getNombre();
    }
    ?>
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
            <?php if(count($escuelas)==0):?>
                <tr>
                    <td colspan="5">No hay escuelas con esos Filtros</td>
                </tr>
            <?php else: ?>
                <?php foreach($escuelas as $e):?>
                    <tr>
                        <td><?=htmlspecialchars($e->getNombre())?></td>
                        <td><?=htmlspecialchars($nomMunicipios[$e->getCodMunicipio()])?></td>
                        <td><?=htmlspecialchars($e->getComedor()?'si':'no')?></td>
                        <td><?= $e->getHoraApertura()?->format("H:i") ?? ""; ?></td>
                        <td><?= $e->getHoraCierre()?->format("H:i") ?? ""; ?></td>
                    </tr>
                    
                
                <?php endforeach;?>

            <?php endif; ?>

        </tbody>
    </table>

   </form>
    
</body>
</html>