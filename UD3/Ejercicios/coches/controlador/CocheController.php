<?php
namespace controlador;

use modelo\CocheModel;

class CocheController extends Controller
{
    public function listarCoches()
    {
        $filterColor = $_REQUEST['color']?? '';
        $coches = CocheModel::listarCoches(['color' => $filterColor]);

        $this->view->show("lista_coches",$coches);
    }


}

?>