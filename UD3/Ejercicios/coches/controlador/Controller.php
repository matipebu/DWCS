<?php 
namespace controlador;
use vista\View;
class Controller{
    public View $view;

    public function __construct() {
        $this->view = new View;
        
    }

} 
?>