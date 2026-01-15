<?php 
namespace controller;

use model\EscuelaModel;
use model\MunicipioModel;
use model\ProvinciaModel;

class EscuelaController extends Controller
{
    function listarEscuelas()
    {
        $filtroProvincia = $_REQUEST['cod_provincia'] ?? '';
        $filtroNombre = $_REQUEST['nombre'] ?? '';
        $filtroMunicipio = $_REQUEST['cod_municipio'] ?? '';

        if (!empty($filtroMunicipio)){
            $filters['cod_municipio']= intval($filtroMunicipio);
        }
        $filters = ['nombre' => $filtroNombre];

        $provincias = ProvinciaModel::getFilter(null);
        $municipios =  MunicipioModel::getFilter(!empty($filtroProvincia)?['cod_provincia'=>intval($filtroProvincia)]:null);
        $escuelas = EscuelaModel::getFilter($filters);

        $this->vista->showView("listar_escuelas",['provincias' => $provincias,'municipios'=>$municipios,'escuelas'=>$escuelas]);

    }

}

?>