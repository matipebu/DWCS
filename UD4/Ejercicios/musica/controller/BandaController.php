<?php
namespace Ejercicios\musica\controller;

use Ejercicios\musica\core\Request;
use Ejercicios\musica\model\BandaModel;
use Ejercicios\musica\model\Model;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\model\vo\BandaVo;

class BandaController{

    public function index(){
        $bandas = BandaModel::getBandas();
        $json = [];
        foreach ($bandas as $banda){
            $json[]= $banda->toArray();

        }
        Response::json($json,200);
    }
    public function show(int $id){
        $banda = BandaModel::getBandaById($id);
        if (!isset($banda)){
            Response::notFound();
            return;
        }
      
        Response::json($banda->toArray(),200);
    }
    public function store(){
        $request = new Request();
        $banda = BandaVo::fromArray($request->body());
        $banda = BandaModel::addBanda($banda);

        Response::json($banda->toArray(),201);
    }

    public function update(int $id){
        $request = new Request();
        $banda = BandaModel::getBandaById($id);
           if (!isset($banda)){
            Response::notFound();
            return;
        }
        $banda->updateVoParams(BandaVo::fromArray($request->body()));
        $banda->setId($id);
        $banda = BandaModel::modBandaById($banda);

        Response::json($banda->toArray(),200);
    }

    public function destroy (int $id){
         if(BandaModel::delBandaById($id)) {
            Response::json(['mensaje'=> "Banda $id eliminada."],200);
        }else{
            Response::notFound();
        }            
        

    }
}