<?php
namespace Ejercicios\musica\controller;

use Ejercicios\musica\core\Request;
use Ejercicios\musica\model\PistaModel;
use Ejercicios\musica\model\Model;
use Ejercicios\musica\core\Response;
use Ejercicios\musica\model\vo\PistaVo;

class PistaController{

    public function index(int $idDisco,int $numPista){
        $pistas = PistaModel::getPistaById($idDisco,$numPista);
        $json = [];
        foreach ($pistas as $p){
            $json[] = $p->toArray();
        }
        Response::json($json,200);


    }
    public function show(int $id){
        $pistas = PistaModel::getPistasByDisco($id);
        $json = [];
        foreach ($pistas as $p){
            $json[] = $p->toArray();
        }
        Response::json($json,200);
    }

    public function store(){
        $request = new Request();
        $pista = PistaVo::fromArray($request->body());
        $pista = PistaModel::addPistaDisco($pista);

        Response::json($pista->toArray(),201);
    }

    public function update(int $id,int $numPista){
        $request = new Request();
        $pista = PistaModel::getPistaById($id, $numPista);
           if (!isset($pista)){
            Response::notFound();
            return;
        }
        $pista->updateVoParams(PistaVo::fromArray($request->body()));
        $pista->setId_disco($id);
        $pista = PistaModel::modPistaDisco($pista);

        Response::json($pista->toArray(),200);
    }

    public function destroy (int $id, int $numPista){
         if(PistaModel::delPistaById($id, $numPista)) {
            Response::json(['mensaje'=> "Pista $id eliminada."],200);
        }else{
            Response::notFound();
        }            
        

    }
}