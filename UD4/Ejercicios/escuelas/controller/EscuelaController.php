<?php
namespace Ejercicios\escuelas\controller;

use Ejercicios\escuelas\model\EscuelaModel;
use Ejercicios\escuelas\model\MunicipioModel;
use Ejercicios\escuelas\model\ProvinciaModel;
use Ejercicios\escuelas\model\vo\EscuelaVO;
class EscuelaController extends Controller
{
    public function listarEscuelas()
    {
        $filterMunicipio = $_REQUEST['cod_municipio'] ?? '';
        $filterNombre = $_REQUEST['nombre'] ?? '';
        $filterProvincia = $_REQUEST['cod_provincia'] ?? '';
        $filters = ['nombre' => $filterNombre];
        if (!empty($filterMunicipio)) {
            $filters['cod_municipio'] = intval($filterMunicipio);

        }

        $provincias = ProvinciaModel::getFilter();
        $municipios = MunicipioModel::getFilter(!empty($filterProvincia)?['cod_provincia'=>intval($filterProvincia)]:null);
        $escuelas = EscuelaModel::getFilter($filters);

        $this->vista->showView("lista_escuelas",['municipios'=>$municipios, 
                                                                'escuelas'=>$escuelas,
                                                                'provincias'=>$provincias]);
    }
    public function addEscuelas(){
        $escuela = new EscuelaVO();
        $escuela->setNombre($_POST['nombre']?? '');
        $escuela->setDireccion($_POST['direccion']?? '');
        $escuela->setCodMunicipio($_POST['cod_municipio']?? null);
        $escuela->setHoraApertura($_POST['hora_apertura']?? '');
        $escuela->setHoraCierre($_POST['hora_cierre']?? '');
        $escuela->setComedor($_POST['comedor']?? null);

        if(EscuelaModel::add($escuela)){
            $this->vista->showView("añadir_escuelas",['info'=>'Escuela Creada Correctamente']);
        }else{
            $this->vista->showView("añadir_escuelas",['info'=>'Escuela Creada Correctamente']);

        }
        

    }
}