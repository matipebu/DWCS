<?php 
namespace controlador;
class ErrorController extends Controller{
    public function pageNotFound(){
        $this->view->show("page-not-found");
        header("HTTP/1.1 404 page not found");
        exit;
    }
}




?>