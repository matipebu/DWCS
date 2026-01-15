<?php 
namespace controller;

use view\View;
class Controller{
    public View $vista;

    public function __construct() {
        $this->vista = new View();
    }
}


?>