<?php
namespace Ejercicios\musica\controller;

use Ejercicios\musica\core\Request;
use Ejercicios\musica\model\DiscoModel;
use Ejercicios\musica\model\Model;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\model\vo\DiscoVo;

class DiscoController{

    public function discosByBanda(int $idBanda){
        $discos = DiscoModel::getDiscosByBanda($idBanda);
        $json = [];
        foreach ($discos as $d){
            $json[] = $d->toArray();
        }
        Response::json($json,200);


    }
    public function index(){
        $discos = DiscoModel::getDiscos();
        $json = [];
        foreach ($discos as $d){
            $json[]= $d->toArray();

        }
        Response::json($json,200);
    }
    public function show(int $id){
        $disco = DiscoModel::getDiscoById($id);
        if (!isset($disco)){
            Response::notFound();
            return;
        }
      
        Response::json($disco->toArray(),200);
    }
    public function store(){
        $request = new Request();
        $disco = DiscoVo::fromArray($request->body());
        $disco = DiscoModel::addDiscoBanda($disco);

        Response::json($disco->toArray(),201);
    }

    public function update(int $id){
        $request = new Request();
        $disco = DiscoModel::getDiscoById($id);
           if (!isset($disco)){
            Response::notFound();
            return;
        }
        $disco->updateVoParams(DiscoVo::fromArray($request->body()));
        $disco->setId($id);
        $disco = DiscoModel::modDiscoById($disco);

        Response::json($disco->toArray(),200);
    }

    public function destroy (int $id){
         if(DiscoModel::delDiscoById($id)) {
            Response::json(['mensaje'=> "Disco $id eliminado."],200);
        }else{
            Response::notFound();
        }            
        

    }
}