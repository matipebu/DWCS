<?php

use Ejercicios\musica\controller\BandaController;
use Ejercicios\musica\controller\DiscoController;
use Ejercicios\musica\controller\PistaController;

$router->get('/bandas',[BandaController::class,'index']);
$router->get('/bandas/{id}',[BandaController::class,'show']);
$router->get('/bandas/{idBanda}/discos',[DiscoController::class,'discosByBanda']);
$router->get('/discos',[DiscoController::class,'index']);
$router->get('/discos/{id}',[DiscoController::class,'show']);
$router->get('/discos/{id}/pistas',[PistaController::class,'show']);
$router->get('/discos/{idDisco}/pistas/{numPista}',[PistaController::class,'index']);



$router->post('/bandas',[BandaController::class,'store']);
$router->post('/bandas/discos',[DiscoController::class,'store']);
$router->post('/discos/{id}/pistas',[PistaController::class,'store']);



$router->post('/bandas/{id}',[BandaController::class,'update']);
$router->post('/discos/{id}',[DiscoController::class,'update']);
$router->post('/discos/{id}/pistas/{numPista}',[PistaController::class,'update']);

$router->post('/bandas/{id}',[BandaController::class,'destroy']);
$router->post('/discos/{id}',[DiscoController::class,'destroy']);
$router->post('/discos/{id}/pistas/{numPista}',[PistaController::class,'destroy']);




