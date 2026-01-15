<?php 
namespace controller;

use model\MunicipioModel;
use model\vo\MunicipioVO;
class MunicipioController extends Controller
{
function getMunicipiosProvinciaJSON(){
    $codProvincia = isset($_REQUEST['cod_provincia']) ? (int)$_REQUEST['cod_provincia'] : null;
    if ($codProvincia === null){
        http_response_code(400);
        echo json_encode(['error' => 'Falta el parametro cod_provincia']);
        return;
    }

    $filtro = !empty($codProvincia)? ['cod_provincia'=>$codProvincia] : null;

    $municipiosVO = MunicipioModel::getFilter($filtro);

    $jsonArray = [];
    foreach ($municipiosVO as $m){
        $jsonArray[] = ['cod_municipio'=> $m->getCodMunicipio(),
                      'nombre'=> $m->getNombre()
                    ];

    }
    header('Content-Type: application/json; chartset=utf-8');
    echo json_encode($jsonArray,JSON_UNESCAPED_UNICODE);
}
}

?>